<?php
// src/AppBundle/Entity/Testimonial.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="testimonials")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\TestimonialRepository")
 */
class Testimonial
{
    use IdMapper;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $quote;

    /**
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $author;

    /**
     * Set quote
     *
     * @param string $quote
     * @return Testimonial
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * Get quote
     *
     * @return string 
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Testimonial
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
