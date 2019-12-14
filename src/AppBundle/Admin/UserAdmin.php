<?php
// src/AppBundle/Admin/UserAdmin.php
namespace AppBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as SonataUserAdmin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Show\ShowMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class UserAdmin extends SonataUserAdmin
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
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
            ->add('createdAt')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text', array(
                'required' => (!$this->getSubject() || is_null($this->getSubject()->getId()))
            ))
        ;
    }
}
