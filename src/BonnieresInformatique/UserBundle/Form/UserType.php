<?php

namespace BonnieresInformatique\UserBundle\Form;

use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //reCaptcha
            ->add('recaptcha', EWZRecaptchaType::class,array(
                'attr'=>array(
                    'option'=>array(
                        'language' => 'en',
                        'theme'=>'light',
                        'type'=>'image',
                        'size'=>'normal',
                        'defer'=>true,
                        'async'=>true,
                        'callback' => 'onReCaptchaSuccess',
                        'bind' => 'btn_submit',
                    )
                )
            ));
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonnieresInformatique\UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonnieresinformatique_userbundle_user';
    }


}
