<?php
// src/AppBundle/Controller/Utility/FormErrorHandlerTrait.php
namespace AppBundle\Controller\Utility;

use Symfony\Component\Form\Form;

trait FormErrorHandlerTrait
{
    public function stringifyFormErrors(Form $form)
    {
        $errors = [];

        foreach ($form->getErrors(true, true) as $error) {
            $errors[] = $error->getMessage();
        }

        return implode(', ', $errors);
    }
}
