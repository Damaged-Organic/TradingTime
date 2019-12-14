<?php
// src/AppBundle/Admin/MetadataAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class MetadataAdmin extends Admin
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
                'label' => "Page title"
            ])
            ->add('route', "text", [
                'label'    => "Router (System setting)"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', "text", [
                'label' => "Page title"
            ])
            ->add('route', "text", [
                'label'    => "Router (System setting)",
                'disabled' => TRUE
            ])
            ->add('description', 'textarea', [
                'label'    => "Page description",
                'required' => FALSE
            ])
            ->add('robots', 'text', [
                'label'    => "Metadata for web crawlers",
                'required' => FALSE
            ])
        ;
    }
}
