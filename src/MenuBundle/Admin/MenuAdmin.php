<?php
// src/MenuBundle/Admin/MenuAdmin.php
namespace MenuBundle\Admin;

use Symfony\Component\Routing\Router;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Show\ShowMapper,
    Sonata\AdminBundle\Route\RouteCollection;

class MenuAdmin extends Admin
{
    protected $_router;

    protected $baseRouteName    = 'menu';
    protected $baseRoutePattern = 'menu';

    public function setRouter(Router $router)
    {
        $this->_router = $router;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('delete')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        //TODO: Kludgy because of shallow "_default" and unmapped help-only parameter
        $path = ( ($menuItem = $this->getSubject()) && ($route = $menuItem->getRoute()) )
            ? $this->_router->generate($route."_default")
            : NULL;

        $formMapper
            ->add('title', 'text', [
                'label' => "Item title"
            ])
            ->add('route', 'text', [
                'label'    => "Router (System setting)",
                'disabled' => TRUE
            ])
            ->add('path', 'text', [
                'label'    => "Path (System setting)",
                'mapped'   => FALSE,
                'disabled' => TRUE,
                'data'     => $path
            ])
        ;
    }

    public function configureShowField(ShowMapper $showMapper){
        $showMapper
            ->add('title', 'text', [
                'label' => "Item title"
            ])
            ->add('route',  'text', [
                'label' => "Path"
            ])
            ->add('id', 'integer', [
                'label' => "Index number"
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', [
                'label' => "Item title"
            ])
            ->add('route',  'text', [
                'label' => "Path"
            ])
            ->add('id', 'integer', [
                'label' => "Index number"
            ])
        ;
    }
}
