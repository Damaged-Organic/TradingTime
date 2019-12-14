<?php
// src/AppBundle/EventListener/PageInitListener.php
namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpKernel\Event\FilterControllerEvent;

use AppBundle\Controller\Contract\PageInitInterface,
    AppBundle\Service\Metadata;

class PageInitListener
{
    private $_request;

    private $_metadata;

    public function __construct(Request $request, Metadata $metadata)
    {
        $this->_request  = $request;

        $this->_metadata = $metadata;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if( !$event->getRequestType() )
            return FALSE;

        $controller = $event->getController();

        $this->_metadata->setCurrentRoute($this->_request->get('_route'));

        if( $controller[0] instanceof PageInitInterface )
        {
            if( !$this->_request->isXmlHttpRequest() )
                $this->_metadata->setCurrentMetadata();
        }
    }
}
