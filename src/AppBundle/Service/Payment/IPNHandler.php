<?php
// src/AppBundle/Service/Payment/IPNHandler.php
namespace AppBundle\Service\Payment;

use DateTime;

use Symfony\Component\HttpFoundation\ParameterBag;

use Doctrine\ORM\EntityManager;

use AppBundle\Entity\PaymentOrder;

class IPNHandler
{
	const PAY_PAL_RESPONSE_VERIFIED = "VERIFIED";

	private $_manager;

	private $payPalGateway;
	private $payPalBusiness;
	private $payPalReceiverId;

	public function __construct(EntityManager $manager, $payPalParameters)
	{
		$this->_manager = $manager;

		$this->payPalGateway    = $payPalParameters['gateway'];
		$this->payPalBusiness   = $payPalParameters['business'];
		$this->payPalReceiverId = $payPalParameters['receiver_id'];
	}

    public function receive($rawPOST)
	{
		$rawPost = explode('&', $rawPOST);

		$postData = [];
		
		foreach($rawPost as $postParameter) {
			$postParameter = explode("=", $postParameter);
			
			if( count($postParameter) == 2 )
				$postData[$postParameter[0]] = urldecode($postParameter[1]);
		}
		
		$paypalRequest = 'cmd=_notify-validate';
		
		foreach($postData as $key => $value) {
			$paypalRequest .= "&{$key}=" . urlencode($value);
		}
		
		return $paypalRequest;
	}
	
	public function respond($paypalRequest)
	{
		$curlChannel = curl_init($this->payPalGateway);

		if( !$curlChannel )
			return FALSE;

		curl_setopt($curlChannel, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curlChannel, CURLOPT_POST, 1);
		curl_setopt($curlChannel, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlChannel, CURLOPT_POSTFIELDS, $paypalRequest);
		curl_setopt($curlChannel, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($curlChannel, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlChannel, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($curlChannel, CURLOPT_HTTPHEADER, ["Connection: Close"]);

		$curlResult = curl_exec($curlChannel);

		curl_close($curlChannel);

		return $curlResult;
	}
	
	public function checkout($payPalResponse, ParameterBag $paymentParameters)
	{
		if( $payPalResponse !== self::PAY_PAL_RESPONSE_VERIFIED )
			return FALSE;

		if( $this->findCompletedTransactionById($paymentParameters->get('txn_id')) )
			return FALSE;

		if( !$paymentParameters->get('item_number') )
			return FALSE;

		if( $item = $this->findItem($paymentParameters->get('item_number')) )
		{
			if( !$this->checkItem($item, $paymentParameters->get('mc_currency'), $paymentParameters->get('mc_gross')) )
				return FALSE;

			if( !$this->checkFacilitator($paymentParameters->get('business'), $paymentParameters->get('receiver_id'), $paymentParameters->get('receiver_email')) )
				return FALSE;

			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function findCompletedTransactionById($txnId)
	{
		return ( $this->_manager->getRepository('AppBundle:PaymentOrder')->findOneBy(['txnId' => $txnId, 'paymentStatus' => "Completed"]) )
			? TRUE
			: FALSE;
	}

	private function findItem($itemNumber)
	{
		if( ($itemBook = $this->_manager->getRepository('AppBundle:Book')->findOneBy(['paymentId' => $itemNumber])) ) {
			return $itemBook;
		} elseif(
			($itemService = $this->_manager->getRepository('AppBundle:Fixed\Pricing')->findOneBy(['paymentId' => $itemNumber])) ) {
			return $itemService;
		} else {
			return FALSE;
		}
	}

	private function checkItem($item, $mcCurrency, $mcGross)
	{
		$currencyMatches = ( $item->getCode() === $mcCurrency );
		$grossMatches    = ( $item->getPrice() === $mcGross );

		return ( $currencyMatches && $grossMatches );
	}

	private function checkFacilitator($business, $receiverId, $receiver)
	{
		$businessMatches   = ( $this->payPalBusiness === $business );
		$receiverIdMatches = ( $this->payPalReceiverId ==  $receiverId);
		$receiverMatches   = ( $this->payPalBusiness === $receiver );

		return ( $businessMatches && $receiverIdMatches && $receiverMatches );
	}

	public function savePaymentOrder(ParameterBag $paymentParameters)
	{
		$paymentOrder = (new PaymentOrder)
			->setTxnId($paymentParameters->get('txn_id'))
			->setDatetime(new DateTime($paymentParameters->get('payment_date')))
			->setItemTitle($paymentParameters->get('item_name'))
			->setCurrencyCode($paymentParameters->get('mc_currency'))
			->setCurrencyPrice($paymentParameters->get('mc_gross'))
			->setPayerId($paymentParameters->get('payer_id'))
			->setPayerFirstName($paymentParameters->get('first_name'))
			->setPayerLastName($paymentParameters->get('last_name'))
			->setPayerEmail($paymentParameters->get('payer_email'))
			->setBusiness($paymentParameters->get('business'))
			->setReceiverEmail($paymentParameters->get('receiver_email'))
			->setReceiverId($paymentParameters->get('receiver_id'))
			->setPaymentType($paymentParameters->get('txn_type'))
			->setPaymentStatus($paymentParameters->get('payment_status'))
			->setReasonCode($paymentParameters->get('reason_code'))
			->setPendingReason($paymentParameters->get('pending_reason'))
			->setCheckoutError($paymentParameters->get('checkout_error'))
		;

		$this->_manager->persist($paymentOrder);
		$this->_manager->flush();
	}
}