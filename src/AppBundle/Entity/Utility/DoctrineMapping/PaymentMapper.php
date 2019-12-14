<?php
// src/AppBundle/Entity/Utility/DoctrineMapping/PaymentMapper.php
namespace AppBundle\Entity\Utility\DoctrineMapping;

use Doctrine\ORM\Mapping as ORM;

trait PaymentMapper
{
    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    protected $paymentId;

    /**
     * Set paymentId
     *
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * Get paymentId
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }
}