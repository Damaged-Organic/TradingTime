<?php
// src/AppBundle/Entity/PaymentOrder.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="payment_orders")
 * @ORM\Entity()
 */
class PaymentOrder
{
    use IdMapper;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $txnId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $datetime;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $itemTitle;

    /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    protected $currencyCode;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $currencyPrice;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     */
    protected $payerId;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $payerFirstName;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $payerLastName;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    protected $payerEmail;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    protected $business;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    protected $receiverEmail;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     */
    protected $receiverId;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $paymentType;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $paymentStatus;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $reasonCode;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $pendingReason;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $checkoutError;

    /**
     * Set txnId
     *
     * @param string $txnId
     * @return PaymentOrder
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;

        return $this;
    }

    /**
     * Get txnId
     *
     * @return string 
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return PaymentOrder
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set itemTitle
     *
     * @param string $itemTitle
     * @return PaymentOrder
     */
    public function setItemTitle($itemTitle)
    {
        $this->itemTitle = $itemTitle;

        return $this;
    }

    /**
     * Get itemTitle
     *
     * @return string 
     */
    public function getItemTitle()
    {
        return $this->itemTitle;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return PaymentOrder
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set currencyPrice
     *
     * @param string $currencyPrice
     * @return PaymentOrder
     */
    public function setCurrencyPrice($currencyPrice)
    {
        $this->currencyPrice = $currencyPrice;

        return $this;
    }

    /**
     * Get currencyPrice
     *
     * @return string 
     */
    public function getCurrencyPrice()
    {
        return $this->currencyPrice;
    }

    /**
     * Set payerId
     *
     * @param string $payerId
     * @return PaymentOrder
     */
    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;

        return $this;
    }

    /**
     * Get payerId
     *
     * @return string 
     */
    public function getPayerId()
    {
        return $this->payerId;
    }

    /**
     * Set payerFirstName
     *
     * @param string $payerFirstName
     * @return PaymentOrder
     */
    public function setPayerFirstName($payerFirstName)
    {
        $this->payerFirstName = $payerFirstName;

        return $this;
    }

    /**
     * Get payerFirstName
     *
     * @return string 
     */
    public function getPayerFirstName()
    {
        return $this->payerFirstName;
    }

    /**
     * Set payerLastName
     *
     * @param string $payerLastName
     * @return PaymentOrder
     */
    public function setPayerLastName($payerLastName)
    {
        $this->payerLastName = $payerLastName;

        return $this;
    }

    /**
     * Get payerLastName
     *
     * @return string 
     */
    public function getPayerLastName()
    {
        return $this->payerLastName;
    }

    /**
     * Set payerEmail
     *
     * @param string $payerEmail
     * @return PaymentOrder
     */
    public function setPayerEmail($payerEmail)
    {
        $this->payerEmail = $payerEmail;

        return $this;
    }

    /**
     * Get payerEmail
     *
     * @return string 
     */
    public function getPayerEmail()
    {
        return $this->payerEmail;
    }

    /**
     * Set business
     *
     * @param string $business
     * @return PaymentOrder
     */
    public function setBusiness($business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get business
     *
     * @return string 
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Set receiverEmail
     *
     * @param string $receiverEmail
     * @return PaymentOrder
     */
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        return $this;
    }

    /**
     * Get receiverEmail
     *
     * @return string 
     */
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    /**
     * Set receiverId
     *
     * @param string $receiverId
     * @return PaymentOrder
     */
    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;

        return $this;
    }

    /**
     * Get receiverId
     *
     * @return string 
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * Set paymentType
     *
     * @param string $paymentType
     * @return PaymentOrder
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Get paymentType
     *
     * @return string 
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set paymentStatus
     *
     * @param string $paymentStatus
     * @return PaymentOrder
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Set reasonCode
     *
     * @param string $reasonCode
     * @return PaymentOrder
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;

        return $this;
    }

    /**
     * Get reasonCode
     *
     * @return string 
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * Set pendingReason
     *
     * @param string $pendingReason
     * @return PaymentOrder
     */
    public function setPendingReason($pendingReason)
    {
        $this->pendingReason = $pendingReason;

        return $this;
    }

    /**
     * Get pendingReason
     *
     * @return string 
     */
    public function getPendingReason()
    {
        return $this->pendingReason;
    }

    /**
     * Set checkoutError
     *
     * @param string $checkoutError
     * @return PaymentOrder
     */
    public function setCheckoutError($checkoutError)
    {
        $this->checkoutError = $checkoutError;

        return $this;
    }

    /**
     * Get checkoutError
     *
     * @return string 
     */
    public function getCheckoutError()
    {
        return $this->checkoutError;
    }
}