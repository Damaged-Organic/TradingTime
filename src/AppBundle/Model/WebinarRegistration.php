<?php
// src/AppBundle/Model/WebinarRegistration.php
namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class WebinarRegistration
{
    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "webinar_registration.name.length_min",
     *      maxMessage = "webinar_registration.name.length_max"
     * )
     */
    protected $name;

    /**
     * @Assert\NotBlank(
     *      message="webinar_registration.email.not_blank"
     * )
     * @Assert\Email(
     *      message="webinar_registration.email.valid"
     * )
     */
    protected $email;

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
}