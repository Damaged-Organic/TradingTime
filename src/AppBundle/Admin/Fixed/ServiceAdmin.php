<?php
// src/AppBundle/Admin/Fixed/ServiceAdmin.php
namespace AppBundle\Admin\Fixed;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class ServiceAdmin extends Admin
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
            ->addIdentifier('title', "text", [
                'label' => "Service title"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('iconName', "text", [
                'label'     => "Service icon",
                'read_only' => TRUE
            ])
            ->add('title', "text", [
                'label' => "Title"
            ])
            ->add('subtitle', "text", [
                'label' => "Subtitle"
            ])
        ;
    }
}