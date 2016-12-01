<?php
// src/AppBundle/DataFixtures/ORM/Fixed/LoadWebinar.php
namespace AppBundle\DataFixtures\ORM\Fixed;

use DateTime;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Fixed\Webinar;

class LoadWebinar implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $webinar = (new Webinar)
            ->setTitle("Here should be your webinar title")
            ->setDescription("Here could be your webinar title")
            ->setDatetime(new DateTime("NOW"))
            ->setIsActive(TRUE);
        $manager->persist($webinar);

        // ---

        $manager->flush();
    }
}