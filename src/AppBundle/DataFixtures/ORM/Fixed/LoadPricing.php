<?php
// src/AppBundle/DataFixtures/ORM/Fixed/LoadPricing.php
namespace AppBundle\DataFixtures\ORM\Fixed;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Fixed\Pricing;

class LoadPricing implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pricingStocks = (new Pricing)
            ->setStringId("stocks")
            ->setPaymentId("S001")
            ->setTitle("Track Our Trade on Stocks")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(99.00);
        $manager->persist($pricingStocks);

        // ---

        $pricingStocksLifetime = (new Pricing)
            ->setStringId("stocks_lifetime")
            ->setPaymentId("L001")
            ->setTitle("Track Our Trade on Stocks (Lifetime subscription)")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(1990.00);
        $manager->persist($pricingStocksLifetime);

        // ---

        $pricingOther = (new Pricing)
            ->setStringId("other")
            ->setPaymentId("S002")
            ->setTitle("Track Our Trade on Indexes, Bonds, Commodities and Currencies")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(99.00);
        $manager->persist($pricingOther);

        // ---

        $pricingOtherLifetime = (new Pricing)
            ->setStringId("other_lifetime")
            ->setPaymentId("L002")
            ->setTitle("Track Our Trade on Indexes, Bonds, Commodities and Currencies (Lifetime subscription)")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(1990.00);
        $manager->persist($pricingOtherLifetime);

        // ---

        $pricingBoth = (new Pricing)
            ->setStringId("both")
            ->setPaymentId("S003")
            ->setTitle("Track Our Trade on Stocks, Indexes, Bonds, Commodities and Currencies")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(150.00);
        $manager->persist($pricingBoth);

        // ---

        $pricingBothLifetime = (new Pricing)
            ->setStringId("both_lifetime")
            ->setPaymentId("L003")
            ->setTitle("Track Our Trade on Stocks, Indexes, Bonds, Commodities and Currencies (Lifetime subscription)")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(2990.00);
        $manager->persist($pricingBothLifetime);

        // ---

        $pricingFourthDimensionLifetime = (new Pricing)
            ->setStringId("fourth_dimension")
            ->setPaymentId("L004")
            ->setTitle("4TH Dimension Lifetime Software License (with full e-mail support)")
            ->setCode("USD")
            ->setSign("$")
            ->setPrice(3990.00);
        $manager->persist($pricingFourthDimensionLifetime);

        // ---

        $manager->flush();
    }
}