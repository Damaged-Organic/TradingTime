<?php
// src/AppBundle/Controller/StateController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Controller\Contract\PageInitInterface;

class StateController extends Controller implements PageInitInterface
{
    /**
     * @Method({"GET"})
     * @Route(
     *      "/",
     *      name="index",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function indexAction(Request $request)
    {
        /* Quick IE detection */
        $userAgent = strtoupper($request->server->get('HTTP_USER_AGENT'));
        $isFuckwit = ( strpos($userAgent, "MSIE") !== FALSE || strpos($userAgent, "TRIDENT") !== FALSE )
            ? TRUE
            : FALSE;

        $manager = $this->getDoctrine()->getManager();

        // Fixed entities
        $sections  = $manager->getRepository('AppBundle:Fixed\Section')->findAll();
        $services  = $manager->getRepository('AppBundle:Fixed\Service')->findAll();
        $pricing   = $manager->getRepository('AppBundle:Fixed\Pricing')->findAll();
        $biography = $manager->getRepository('AppBundle:Fixed\Biography')->findAll();
        $webinars  = $manager->getRepository('AppBundle:Fixed\Webinar')->findAll();

        // Dynamic entities
        $twoTopBooks  = $manager->getRepository('AppBundle:Book')->findTwoTopBooks();
        $testimonials = $manager->getRepository('AppBundle:Testimonial')->findAll();

        return $this->render('AppBundle:State:index.html.twig', [
            'isFuckwit'    => $isFuckwit,
            'metadata'     => $this->get('app.metadata')->getCurrentMetadata(),
            'sections'     => $sections,
            'services'     => $services,
            'pricing'      => $pricing,
            'biography'    => $biography,
            'webinars'     => $webinars,
            'twoTopBooks'  => $twoTopBooks,
            'testimonials' => $testimonials
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route(
     *      "/study",
     *      name="study",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function studyAction()
    {
        $manager = $this->getDoctrine()->getManager();

        $pricing = $manager->getRepository('AppBundle:Fixed\Pricing')->findAll();

        $fourthDimensionSection = $manager->getRepository('AppBundle:Fixed\Section')->findBySectionStringId('fourth_dimension');
        $detailsBenefitsSection = $manager->getRepository('AppBundle:Fixed\Section')->findBySectionStringId('details_benefits');

        $indicators = $manager->getRepository('AppBundle:Indicator')->findAll();

        return $this->render('AppBundle:State:study.html.twig', [
            'metadata'               => $this->get('app.metadata')->getCurrentMetadata(),
            'pricing'                => $pricing,
            'fourthDimensionSection' => $fourthDimensionSection,
            'detailsBenefitsSection' => $detailsBenefitsSection,
            'indicators'             => $indicators
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route(
     *      "/books",
     *      name="books",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function booksAction()
    {
        $manager = $this->getDoctrine()->getManager();

        $booksSection = $manager->getRepository('AppBundle:Fixed\Section')->findBySectionStringId('books');

        $books = $manager->getRepository('AppBundle:Book')->findBy([], ['year' => "DESC"]);

        return $this->render('AppBundle:State:books.html.twig', [
            'metadata'     => $this->get('app.metadata')->getCurrentMetadata(),
            'booksSection' => $booksSection,
            'books'        => $books
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route(
     *      "/education",
     *      name="education",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function educationAction()
    {
        $educationSection = $this->getDoctrine()->getManager()->getRepository('AppBundle:Fixed\Section')
            ->findBySectionStringId('education');

        return $this->render('AppBundle:State:education.html.twig', [
            'metadata'         => $this->get('app.metadata')->getCurrentMetadata(),
            'educationSection' => $educationSection
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route(
     *      "/webinars",
     *      name="webinars",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function webinarsAction()
    {
        $webinarsSection = $this->getDoctrine()->getManager()->getRepository('AppBundle:Fixed\Section')
            ->findBySectionStringId('webinars');

        $webinars = $this->getDoctrine()->getManager()->getRepository('AppBundle:Fixed\Webinar')->findAll();

        return $this->render('AppBundle:State:webinars.html.twig', [
            'metadata'        => $this->get('app.metadata')->getCurrentMetadata(),
            'webinarsSection' => $webinarsSection,
            'webinars'        => $webinars
        ]);
    }

    /**
     * @Method({"GET"})
     * @Route(
     *      "/get_in_touch",
     *      name="get_in_touch",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function getInTouchAction()
    {
        return $this->render('AppBundle:State:getInTouch.html.twig', [
            'metadata' => $this->get('app.metadata')->getCurrentMetadata()
        ]);
    }
}
