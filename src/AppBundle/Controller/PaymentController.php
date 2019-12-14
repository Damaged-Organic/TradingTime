<?php
// src/AppBundle/Controller/PaymentController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PaymentController extends Controller
{
    const ACCEPTED_PAYMENT_WEB    = "web_accept";
    const ACCEPTED_PAYMENT_SUBSCR = "subscr_payment";

    /**
     * @Method({"POST"})
     * @Route(
     *      "/payment",
     *      name="payment"
     * )
     */
    public function paymentAction(Request $request)
    {
        if( !($paymentParameters = $request->request) )
            throw $this->createNotFoundException();

        $acceptedPayments = [self::ACCEPTED_PAYMENT_WEB, self::ACCEPTED_PAYMENT_SUBSCR];

        if( in_array($request->request->get('txn_type'), $acceptedPayments, TRUE) )
        {
            file_put_contents('paypal_ipn_log.txt', print_r($request->request->all(), TRUE), FILE_APPEND);

            $_IPNHandler = $this->get('app.ipn_handler');

            $payPalRequest = $_IPNHandler->receive(file_get_contents('php://input'));
            $payPalResponse = $_IPNHandler->respond($payPalRequest);

            if (!$_IPNHandler->checkout($payPalResponse, $paymentParameters)) {
                $paymentParameters->set('checkout_error', 'Possible fraud: initial and final payment parameters mismatch');
            }

            $_IPNHandler->savePaymentOrder($paymentParameters);
        }

        return new Response(NULL, 200);
    }

    /**
     * @Method({"POST"})
     * @Route(
     *      "/payment_success",
     *      name="payment_success"
     * )
     */
    public function paymentSuccessAction(Request $request)
    {
        if( !($paymentParameters = $request->request) )
            throw $this->createNotFoundException();

        return $this->render('AppBundle:Payment\State:paymentSuccess.html.twig', [
            'txnID'     => $request->request->get('txn_id'),
            'firstName' => $request->request->get('first_name'),
            'lastName'  => $request->request->get('last_name')
        ]);
    }

    /**
     * @Method({"POST"})
     * @Route(
     *      "/payment_fail",
     *      name="payment_fail"
     * )
     */
    public function paymentFailAction(Request $request)
    {
        if( !($paymentParameters = $request->request) )
            throw $this->createNotFoundException();

        return $this->render('AppBundle:Payment\State:paymentFail.html.twig', [
            'txnID'     => $request->request->get('txn_id'),
            'firstName' => $request->request->get('first_name'),
            'lastName'  => $request->request->get('last_name')
        ]);
    }
}