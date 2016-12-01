<?php
// src/AppBundle/Controller/FormController.php
namespace AppBundle\Controller;

use DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\JsonResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Controller\Utility\FormErrorHandlerTrait;

use AppBundle\Model\Feedback,
    AppBundle\Form\Type\FeedbackType,
    AppBundle\Model\WebinarRegistration,
    AppBundle\Form\Type\WebinarRegistrationType;

class FormController extends Controller
{
    use FormErrorHandlerTrait;

    /**
     * @Method({"POST"})
     * @Route(
     *      "/feedbackSend",
     *      name="feedback_send",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function feedbackSendAction(Request $request)
    {
        $feedbackForm = $this->createForm(new FeedbackType, ($feedback = new Feedback));

        $feedbackForm->handleRequest($request);

        if( !($feedbackForm->isValid()) ) {
            $response = [
                'data' => ['message' => $this->stringifyFormErrors($feedbackForm)],
                'code' => 500
            ];
        } else {
            $subject = $this->get('translator')->trans("feedback.subject", [
                "%datetime%" => (new DateTime)->format('H:i:s d-m-Y')
            ], 'emails');

            $body = $this->renderView('AppBundle:Email:feedback.html.twig', [
                'feedback'  => $feedback
            ]);

            if( $this->get('app.mailer_shortcut')->sendMail(["webmaster@cheers-development.in.ua" => "Trading Time Website"], "tradingtime@btinternet.com", $subject, $body) ) {
                $response = [
                    'data' => ['message' => $this->get('translator')->trans("feedback.success", [], 'responses')],
                    'code' => 200
                ];
            } else {
                $response = [
                    'data' => ['message' => $this->get('translator')->trans("feedback.fail", [], 'responses')],
                    'code' => 500
                ];
            }
        }

        return new JsonResponse($response['data'], $response['code']);
    }

    public function feedbackFormAction()
    {
        $feedbackForm = $this->createForm(new FeedbackType, new Feedback);

        return $this->render('AppBundle:Form:feedbackForm.html.twig', [
            'feedbackForm' => $feedbackForm->createView()
        ]);
    }

    /**
     * @Method({"POST"})
     * @Route(
     *      "/webinarRegister",
     *      name="webinar_register",
     *      host="{domain}",
     *      defaults={"_locale" = "%locale%", "domain" = "%domain%"},
     *      requirements={"domain" = "%domain%"}
     * )
     */
    public function webinarRegisterAction(Request $request)
    {
        $webinarRegistrationForm = $this->createForm(new WebinarRegistrationType, ($webinarRegistration = new WebinarRegistration));

        $webinarRegistrationForm->handleRequest($request);

        if( !($webinarRegistrationForm->isValid()) ) {
            $response = [
                'data' => ['message' => $this->stringifyFormErrors($webinarRegistrationForm)],
                'code' => 500
            ];
        } else {
            $subject = $this->get('translator')->trans("webinar_registration.subject", [
                "%datetime%" => (new DateTime)->format('H:i:s d-m-Y')
            ], 'emails');

            $body = $this->renderView('AppBundle:Email:webinarRegistration.html.twig', [
                'webinarRegistration' => $webinarRegistration
            ]);

            if( $this->get('app.mailer_shortcut')->sendMail(["webmaster@cheers-development.in.ua" => "Trading Time Website"], "tradingtime@btinternet.com", $subject, $body) ) {
                $response = [
                    'data' => ['message' => $this->get('translator')->trans("webinar_registration.success", [], 'responses')],
                    'code' => 200
                ];
            } else {
                $response = [
                    'data' => ['message' => $this->get('translator')->trans("webinar_registration.fail", [], 'responses')],
                    'code' => 500
                ];
            }
        }

        return new JsonResponse($response['data'], $response['code']);
    }

    public function webinarRegistrationFormAction()
    {
        $webinarRegistrationForm = $this->createForm(new WebinarRegistrationType, new WebinarRegistration);

        return $this->render('AppBundle:Form:webinarRegistrationForm.html.twig', [
            'webinarRegistrationForm' => $webinarRegistrationForm->createView()
        ]);
    }
}