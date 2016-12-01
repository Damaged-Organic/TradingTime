<?php
// src/AppBundle/DataFixtures/ORM/Fixed/LoadBiography.php
namespace AppBundle\DataFixtures\ORM\Fixed;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Fixed\Biography;

class LoadBiography implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $biographyPawn = (new Biography)
            ->setIconName("pawn")
            ->setDescription("Started trading at age 16 with Rudolf Wolff Commodity Brokers, trading and brokering Soft Commodities, Oil and LME before being promoted to lead their market making FX Spot and Forwards");
        $manager->persist($biographyPawn);

        // ---

        $biographyRook = (new Biography)
            ->setIconName("rook")
            ->setDescription("Went on to Fulton Prebon to trade Bond Futures, and then to Australia to head trading for AFP, specializing in stock options and convertible note arbitrage. At the same time, joined Reuters to be part of the design and launch team of the Globex platform");
        $manager->persist($biographyRook);

        // ---

        $biographyKing = (new Biography)
            ->setIconName("king")
            ->setDescription("Being a technical analyst at CQG for 20 years, teaching, consulting, and promoting technical analysis and system creation around the world, currently a full time trader and mentor on an individual and corporate basis");
        $manager->persist($biographyKing);

        // ---

        $manager->flush();
    }
}