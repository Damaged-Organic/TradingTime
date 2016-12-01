<?php
// src/AppBundle/Entity/Fixed/Pricing.php
namespace AppBundle\Entity\Fixed;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper,
    AppBundle\Entity\Utility\DoctrineMapping\PaymentMapper;

/**
 * @ORM\Table(name="fixed_pricing")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Fixed\PricingRepository")
 */
class Pricing
{
    use IdMapper, PaymentMapper;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    protected $stringId;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $price;

    /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    protected $sign;

    /**
     * Set stringId
     *
     * @param string $stringId
     * @return Section
     */
    public function setStringId($stringId)
    {
        $this->stringId = $stringId;

        return $this;
    }

    /**
     * Get stringId
     *
     * @return string
     */
    public function getStringId()
    {
        return $this->stringId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Pricing
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Pricing
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Pricing
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set sign
     *
     * @param string $sign
     * @return Pricing
     */
    public function setSign($sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get sign
     *
     * @return string 
     */
    public function getSign()
    {
        return $this->sign;
    }
}