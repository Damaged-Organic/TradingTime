<?php
// src/AppBundle/Admin/Fixed/WebinarAdmin.php
namespace AppBundle\Admin\Fixed;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class WebinarAdmin extends Admin
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
            ->addIdentifier('title', "text", [
                'label' => "Webinar title"
            ])
            ->add('datetime', "datetime", [
                'label' => "Event date"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $attr = ( $this->getSubject()->getIsActive() == TRUE )
            ? ['checked' => 'checked']
            : [];

        $formMapper
            ->add('title', "text", [
                'label' => "Webinar title"
            ])
            ->add('description', "textarea", [
                'label'    => "Description",
                'required' => FALSE
            ])
            ->add('datetime', "sonata_type_datetime_picker", [
                'label' => "Event date"
            ])
            ->add('isActive', 'checkbox', [
                'label'    => "Show to users",
                'required' => FALSE,
                'attr'     => $attr
            ])
        ;
    }
}