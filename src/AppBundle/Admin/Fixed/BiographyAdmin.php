<?php
// src/AppBundle/Admin/Fixed/BiographyAdmin.php
namespace AppBundle\Admin\Fixed;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class BiographyAdmin extends Admin
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
            ->addIdentifier('id', "text", [
                'label' => "ID",
            ])
            ->add('iconName', "text", [
                'label' => "Part marker",
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('iconName', "text", [
                'label'     => "Biography icon",
                'read_only' => TRUE
            ])
            ->add('description', "textarea", [
                'label' => "Description"
            ])
        ;
    }
}
