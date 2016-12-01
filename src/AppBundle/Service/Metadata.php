<?php
// src/AppBundle/Service/Metadata.php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class Metadata
{
    protected $_manager;

    private $currentMetadata;

    private $currentRoute;

    public function __construct(EntityManager $manager)
    {
        $this->_manager = $manager;
    }

    public function setCurrentRoute($currentRoute)
    {
        $this->currentRoute = ( $currentRoute ) ?: NULL;
    }

    public function getCurrentRoute()
    {
        return $this->currentRoute;
    }

    public function setCurrentMetadata()
    {
        if( $this->currentRoute )
            $this->currentMetadata = $this->_manager
                ->getRepository('AppBundle:Metadata')
                ->findOneByRoute($this->currentRoute);
    }

    public function getCurrentMetadata()
    {
        return $this->currentMetadata;
    }
}