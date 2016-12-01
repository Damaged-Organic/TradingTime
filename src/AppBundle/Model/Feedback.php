<?php
// src/AppBundle/Model/Feedback.php
namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Feedback
{
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "feedback.name.length_min",
     *      maxMessage = "feedback.name.length_max"
     * )
     */
    protected $name;

    /**
     * @Assert\NotBlank(
     *      message="feedback.email.not_blank"
     * )
     * @Assert\Email(
     *      message="feedback.email.valid"
     * )
     */
    protected $email;

    /**
     * @Assert\NotBlank(
     *      message = "feedback.message.not_blank"
     * )
     * @Assert\Length(
     *      min = 5,
     *      max = 1500,
     *      minMessage = "feedback.message.length_min",
     *      maxMessage = "feedback.message.length_max"
     * )
     */
    protected $message;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
}