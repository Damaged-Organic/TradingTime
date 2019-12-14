<?php
// src/AppBundle/Admin/PaymentOrderAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class PaymentOrderAdmin extends Admin
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
            ->add('txnId', 'text', [
                'label' => "Transaction ID"
            ])
            ->addIdentifier('itemTitle', 'text', [
                'label' => "Item title"
            ])
            ->add('datetime', 'datetime', [
                'label' => "Transaction date"
            ])
            ->add('payerId', 'text', [
                'label' => "Payer PayPal ID"
            ])
            ->add('currencyPrice', 'number', [
                'label'     => "Price",
                'precision' => 2
            ])
            ->add('currencyCode', 'text', [
                'label' => "Currency"
            ])
            ->add('paymentType', 'text', [
                'label' => "Payment type"
            ])
            ->add('paymentStatus', 'text', [
                'label' => "Payment status"
            ])
            ->add('checkoutError', 'text', [
                'label' => "Checkout error"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('txnId', 'text', [
                'label'     => "Transaction ID",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('itemTitle', 'text', [
                'label'     => "Item title",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('datetime', 'sonata_type_datetime_picker', [
                'label'     => "Transaction date",
                'read_only' => TRUE,
                'disabled'  => TRUE,
                'required'  => FALSE
            ])
            ->add('payerId', 'text', [
                'label'     => "Payer PayPal ID",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('payerFirstName', 'text', [
                'label'     => "Payer first name",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('payerLastName', 'text', [
                'label'     => "Payer last name",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('payerEmail', 'text', [
                'label'     => "Payer email",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('business', 'text', [
                'label'     => "Business email",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('receiverEmail', 'text', [
                'label'     => "Receiver email",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('receiverId', 'text', [
                'label'     => "Receiver ID",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('currencyPrice', 'number', [
                'label'     => "Price",
                'precision' => 2,
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('currencyCode', 'text', [
                'label'     => "Currency",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('paymentType', 'text', [
                'label'     => "Payment type",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('paymentStatus', 'text', [
                'label'     => "Payment status",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
            ->add('checkoutError', 'text', [
                'label'     => "Checkout error (optional)",
                'read_only' => TRUE,
                'required'  => FALSE
            ])
        ;
    }
}