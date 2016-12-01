<?php
// src/AppBundle/Form/Type/WebinarRegistrationType.php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WebinarRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", 'text', [
                'label' => "webinar_registration.name.label",
                'attr'  => [
                    'placeholder' => "webinar_registration.name.placeholder"
                ]
            ])
            ->add("email", 'email', [
                'label' => "webinar_registration.email.label",
                'attr'  => [
                    'placeholder' => "webinar_registration.email.placeholder"
                ]
            ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'         => 'AppBundle\Model\WebinarRegistration',
            'translation_domain' => 'forms'
        ]);
    }

    public function getName()
    {
        return "webinarRegistrationType";
    }
}