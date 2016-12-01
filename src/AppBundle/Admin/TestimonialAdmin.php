<?php
// src/AppBundle/Admin/TestimonialAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper;

class TestimonialAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('author', "text", [
                'label' => "Author name"
            ])
            ->add('quote', "text", [
                'label' => "Quote"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('author', "text", [
                'label' => "Author name"
            ])
            ->add('quote', "textarea", [
                'label' => "Quote"
            ])
        ;
    }
}