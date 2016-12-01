<?php
// src/MenuBundle/Menu/MenuBuilder.php
namespace MenuBundle\Menu;

use Doctrine\ORM\EntityManager;

use Knp\Menu\FactoryInterface;

use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $_factory;
    private $_manager;

    public function __construct(FactoryInterface $factory, EntityManager $manager)
    {
        $this->_factory = $factory;
        $this->_manager = $manager;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->_factory->createItem('root');

        $items = $this->_manager->getRepository('MenuBundle:Menu')->findAll();

        $menu->setChildrenAttribute('class', 'nav');
        $menu->setExtra('currentElement', 'active');

        $currentRoute = $requestStack->getMasterRequest()->attributes->get('_route');

        foreach($items as $item)
        {
            if( $item->getRoute() === $currentRoute ) {
                $linkAttributes = [
                    'data-hover' => $item->getTitle(),
                    'class'      => 'active'
                ];
            } else {
                $linkAttributes = [
                    'data-hover' => $item->getTitle()
                ];
            }

            $menu->addChild($item->getTitle(), [
                'route'          => $item->getRoute(),
                'linkAttributes' => $linkAttributes
            ]);
        }

        return $menu;
    }
}