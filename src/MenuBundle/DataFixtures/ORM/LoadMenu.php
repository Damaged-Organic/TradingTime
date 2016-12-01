<?php
// src/MenuBundle/DataFixtures/ORM/LoadMenu.php
namespace MenuBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use MenuBundle\Entity\Menu;

class LoadMenu extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $menuItem = (new Menu)
            ->setTitle("Homepage")
            ->setRoute("index");
        $manager->persist($menuItem);
        $manager->flush();

        // ---

        $menuItem = (new Menu)
            ->setTitle("Study")
            ->setRoute("study");
        $manager->persist($menuItem);
        $manager->flush();

        // ---

        $menuItem = (new Menu)
            ->setTitle("Books")
            ->setRoute("books");
        $manager->persist($menuItem);
        $manager->flush();

        // ---

        $menuItem = (new Menu)
            ->setTitle("Education")
            ->setRoute("education");
        $manager->persist($menuItem);
        $manager->flush();

        // ---

        $menuItem = (new Menu)
            ->setTitle("Webinars")
            ->setRoute("webinars");
        $manager->persist($menuItem);
        $manager->flush();

        // ---

        $menuItem = (new Menu)
            ->setTitle("Get In Touch")
            ->setRoute("get_in_touch");
        $manager->persist($menuItem);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
