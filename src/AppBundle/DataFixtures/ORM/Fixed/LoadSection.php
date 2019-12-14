<?php
// src/AppBundle/DataFixtures/ORM/Fixed/LoadSection.php
namespace AppBundle\DataFixtures\ORM\Fixed;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Fixed\Section;

class LoadSection implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sectionFourthDimension = (new Section)
            ->setStringId("fourth_dimension")
            ->setTitle("4TH Dimension")
            ->setSubtitle("Using the fourth dimension to create a third spatial. Visualization from a two dimensional image")
            ->setShortDescription(NULL)
            ->setFullDescription("<p>Based on the ground breaking book Trading Time, New Methods in Technical Analysis and the 2014 Technical Analysis Book of the Year, Mapping Your Voyage of Discovery, Fourth Dimension has built a suite of over 30 indicators and code, designed to provide the complete technical picture. The combination of trend following tools, breakout Indicators, divergence patterns and the ability to visualize multiple timeframe support and resistance in one image, creates a unique and powerful insight into today’s markets. The focus of support and guidance is for the trading of American stocks, but Fourth Dimension has application across all markets and all types of traders.</p>");
        $sectionFourthDimension->setRawContent(
            $sectionFourthDimension->getFullDescription()
        );
        $manager->persist($sectionFourthDimension);

        // ---

        $sectionDetailsBenefits = (new Section)
            ->setStringId("details_benefits")
            ->setTitle("Details and benefits")
            ->setSubtitle("Expanding the market's measurement")
            ->setShortDescription(NULL)
            ->setFullDescription("<p>Fourth Dimension provides all the tools required to navigate today’s markets. Over 50 years of experience has been utilized to overcome one of the key issues traders face today: Screen Real Estate. In a world of over 7,500 American stocks, the ability to screen, monitor, alert and then implement strategies that analyses multiple timeframes through one image creates a unique and instant form of analysis that both saves time and allows for the complete technical picture to be understood. Many of the indicators and derivative code are fixed in nature as we have done all the work to provide you with a framework without endless variables. The studies and code apply to all markets and all time frames.</p>");
        $sectionDetailsBenefits->setRawContent(
            $sectionDetailsBenefits->getFullDescription()
        );
        $manager->persist($sectionDetailsBenefits);

        // ---

        $sectionWebinars = (new Section)
            ->setStringId("webinars")
            ->setTitle("Webinars")
            ->setSubtitle("Educational online events")
            ->setShortDescription(NULL)
            ->setFullDescription("<p>Subscribers to either eSignal or Track Our Trades have access to our periodic market updates that cover recent signals and trades, which acts as both educational and motivational.</p>");
        $sectionWebinars->setRawContent(
            $sectionWebinars->getFullDescription()
        );
        $manager->persist($sectionWebinars);

        // ---

        $sectionEducation = (new Section)
            ->setStringId("education")
            ->setTitle("Education")
            ->setSubtitle("Educational video materials")
            ->setShortDescription(NULL)
            ->setFullDescription("<p>Below are some video introduction so the suite of indicators. 4TH Dimension also provides mentoring programmes on both a face to face or webinar sessions basis for both new and experienced traders for either an individual or group . These are custom built to tailor the programme to your needs and wishes and involves an interview process, so that both sides are happy to proceed.</p>");
        $sectionEducation->setRawContent(
            $sectionEducation->getFullDescription()
        );
        $manager->persist($sectionEducation);

        // ---

        $sectionTradingTime = (new Section)
            ->setStringId("trading_time")
            ->setTitle("Trading Time")
            ->setSubtitle("Mentoring. Consulting. Education")
            ->setShortDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis nunc risus. Quisque ac lectus id dolor dictum dictum. Mauris tincidunt varius felis, vel consequat felis molestie at. Curabitur quis facilisis nulla.")
            ->setFullDescription("<p>Trading Time is...</p>");
        $sectionTradingTime->setRawContent(
            $sectionTradingTime->getFullDescription()
        );
        $manager->persist($sectionTradingTime);

        // ---

        $sectionBooks = (new Section)
            ->setStringId("books")
            ->setTitle("Books")
            ->setSubtitle("By Shaun Downey")
            ->setShortDescription("Trading time aims to provide a framework around mentoring programme for both new and experienced traders. Its basis begins with two books which reflect specific trading philosophy and execution process.")
            ->setFullDescription("<p>Trading Time aims to provide a framework around mentoring programme for both new and experienced traders. Its basis begins with two books which reflect specific trading philosophy and execution process. The first, published in 2007, concentrates on custom built studies and observations, that forms the core of the 4TH Dimension. The second, 2014 Technical Analysis Book of the Year, Mapping Your Voyage of Discovery, takes established studies and mantras and describes the framework for creating a trading plan. This extends from the scalper all the way to the strategic player, novice to seasoned professional.</p>");
        $sectionBooks->setRawContent(
            $sectionBooks->getFullDescription()
        );
        $manager->persist($sectionBooks);

        // ---

        $sectionTrackMyTrade = (new Section)
            ->setStringId("track_my_trade")
            ->setTitle("Track Our Trade")
            ->setSubtitle("Real time insight")
            ->setShortDescription("Trading Time programme involved the development of new techniques that complement and go beyond the books instructions to enable micro trading of strategic trends and reversal points. In order to support traders and follow our daily trades and thoughts, we created Track Our Trade.")
            ->setFullDescription("<p>Trading Time programme involved the development of new techniques that complement and go beyond the books instructions to enable micro trading of strategic trends and reversal points. Something that can be regarded as essential in an algo dominated environment. This provides application for the day trader whilst allowing the longer term player to understand intraday entry points. The aim is to minimize risk so that volume can be higher. In order to support traders and follow our daily trades and thoughts, we created Track Our Trade.</p>");
        $sectionTrackMyTrade->setRawContent(
            $sectionTrackMyTrade->getFullDescription()
        );
        $manager->persist($sectionTrackMyTrade);

        // ---

        $sectionAboutAuthor = (new Section)
            ->setStringId("about_the_author")
            ->setTitle("About the Author")
            ->setSubtitle("Creator of Trading Time")
            ->setShortDescription("Shaun Downey, a Grandfathered member of the Society of Technical Analysts in the United Kingdom and the creator of Trading Time.")
            ->setFullDescription(NULL);
        $sectionAboutAuthor->setRawContent(
            $sectionAboutAuthor->getFullDescription()
        );
        $manager->persist($sectionAboutAuthor);

        // ---

        $sectionTestimonials = (new Section)
            ->setStringId("testimonials")
            ->setTitle("Testimonials")
            ->setSubtitle("What people think")
            ->setShortDescription(NULL)
            ->setFullDescription(NULL);
        $sectionTestimonials->setRawContent(
            $sectionTestimonials->getFullDescription()
        );
        $manager->persist($sectionTestimonials);

        // ---

        $manager->flush();
    }
}