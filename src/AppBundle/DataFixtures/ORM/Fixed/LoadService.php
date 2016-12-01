<?php
// src/AppBundle/DataFixtures/ORM/Fixed/LoadService.php
namespace AppBundle\DataFixtures\ORM\Fixed;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Fixed\Service;

class LoadService implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $serviceBooks = (new Service)
            ->setIconName("book-pile")
            ->setTitle("Books")
            ->setSubtitle("Accumulated knowledge");
        $manager->persist($serviceBooks);

        // ---

        $serviceTrackMyTrade = (new Service)
            ->setIconName("candlestick")
            ->setTitle("Track My Trade")
            ->setSubtitle("Real-time experience");
        $manager->persist($serviceTrackMyTrade);

        // ---

        $serviceVisuals = (new Service)
            ->setIconName("eye")
            ->setTitle("Visuals")
            ->setSubtitle("Educational videos");
        $manager->persist($serviceVisuals);

        // ---

        $manager->flush();
    }
}