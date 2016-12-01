<?php
// src/AppBundle/Entity/Utility/ErrorHandlerTrait.php
namespace AppBundle\Entity\Utility;

trait ErrorHandlerTrait
{
    private $error;

    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    public function getError()
    {
        return $this->error;
    }
}
