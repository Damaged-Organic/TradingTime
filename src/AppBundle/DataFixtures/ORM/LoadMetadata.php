<?php
// src/AppBundle/DataFixtures/ORM/LoadMetadata.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Metadata;

class LoadMetadata extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $metadata_1 = (new Metadata)
            ->setRoute("index")
            ->setRobots("index, follow")
            ->setTitle("Homepage")
            ->setDescription("4TH Dimension by Trading Time - suite of over 30 trading indicators and code, designed to provide complete technical picture. Trading Time also offers mentoring, consulting and educational materials - Track Our Trades market insights, videos, webinars and award-winning trading books by Shaun Downey.");

        $manager->persist($metadata_1);

        // ---

        $metadata_2 = (new Metadata)
            ->setRoute("study")
            ->setRobots("index, follow")
            ->setTitle("Study")
            ->setDescription("4TH Dimension is a combination of trend following tools, breakout indicators, divergence patterns and the ability to visualize multiple timeframe support and resistance in one image, creates a unique and powerful insight into today’s markets. You can buy 4TH Dimension from eSignal or get a lifetime subscription directly from Trading Time.");

        $manager->persist($metadata_2);

        // ---

        $metadata_3 = (new Metadata)
            ->setRoute("books")
            ->setRobots("index, follow")
            ->setTitle("Books")
            ->setDescription("Here you can see PDF previews and buy ground breaking books Trading Time, New Methods in Technical Analysis and the 2014 Technical Analysis Book of the Year, Mapping Your Voyage of Discovery.");

        $manager->persist($metadata_3);

        // ---

        $metadata_4 = (new Metadata)
            ->setRoute("education")
            ->setRobots("index, follow")
            ->setTitle("Education")
            ->setDescription("Video introduction so the suite of indicators. 4TH Dimension also provides mentoring programmes on both a face to face or webinar sessions basis for both new and experienced traders for either an individual or group.");

        $manager->persist($metadata_4);

        // ---

        $metadata_4 = (new Metadata)
            ->setRoute("webinars")
            ->setRobots("index, follow")
            ->setTitle("Webinars")
            ->setDescription("Subscribers to either eSignal or Track Our Trades have access to our periodic market updates that cover recent signals and trades, which acts as both educational and motivational.");

        $manager->persist($metadata_4);

        // ---

        $metadata_5 = (new Metadata)
            ->setRoute("get_in_touch")
            ->setRobots("index, follow")
            ->setTitle("Get In Touch")
            ->setDescription("Contact Trading Time if you have something to say. We will be excited to receive your feedback!");

        $manager->persist($metadata_5);

        // ---

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}