<?php
// src/AppBundle/Admin/Fixed/PricingAdmin.php
namespace AppBundle\Admin\Fixed;

use Symfony\Component\Validator\Constraints as Assert;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class PricingAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('delete')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('ID', "number", [
                'label' => "ID"
            ])
            ->addIdentifier('title', 'text', [
                'label' => "Service title"
            ])
            ->add('price', 'number', [
                'label' => "Price",
                'precision'   => 2
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('paymentId', 'text', [
                'label'     => 'PayPal item ID',
                'read_only' => TRUE
            ])
            ->add('title', 'text', [
                'label' => 'PayPal service title'
            ])
            ->add('code', 'text', [
                'label'     => "Currency code",
                'read_only' => TRUE
            ])
            ->add('sign', 'text', [
                'label'     => "Currency sign",
                'read_only' => TRUE
            ])
            ->add('price', 'number', [
                'label'       => "Price",
                'precision'   => 2,
                'constraints' => [
                    new Assert\Range(['min' => 0])
                ]
            ])
        ;
    }
}