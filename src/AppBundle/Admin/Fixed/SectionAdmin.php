<?php
// src/AppBundle/Admin/Fixed/SectionAdmin.php
namespace AppBundle\Admin\Fixed;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class SectionAdmin extends Admin
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
                'label' => "Section title"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', "text", [
                'label' => "Section title"
            ])
            ->add('subtitle', "text", [
                'label' => "Subtitle"
            ])
            ->add('shortDescription', "textarea", [
                'label'    => "Short description",
                'required' => FALSE
            ])
            ->add('fullDescription', 'sonata_formatter_type', [
                'label'                => "Full description",
                'required'             => FALSE,
                'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'         => 'contentFormatter',
                'source_field'         => 'rawContent',
                'ckeditor_context'     => 'base_config',
                'source_field_options' => [
                    'attr' => [
                        'class' => 'span10', 'rows' => 10
                    ]
                ],
                'listener'             => TRUE,
                'target_field'         => 'fullDescription'
            ])
        ;
    }
}
