<?php
// src/AppBundle/DataFixtures/ORM/LoadTestimonial.php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Testimonial;

class LoadTestimonial implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $testimonial_1 = (new Testimonial)
            ->setQuote("Mister Shaun gave me advice about gold, very good advice, I should trade it all the time!")
            ->setAuthor("The World's Fastest Indian");
        $manager->persist($testimonial_1);

        // ---

        $testimonial_2 = (new Testimonial)
            ->setQuote("Selling right into the Payrolls was a tremendous idea, I enjoy my new Rolls Royce so much! Thank you, Trading Time.")
            ->setAuthor("Cool Trader, \"Monkey Balls Inc.\"");
        $manager->persist($testimonial_2);

        // ---

        $testimonial_3 = (new Testimonial)
            ->setQuote("Can I feel your legs?")
            ->setAuthor("Dude");
        $manager->persist($testimonial_3);

        // ---

        $manager->flush();
    }
}