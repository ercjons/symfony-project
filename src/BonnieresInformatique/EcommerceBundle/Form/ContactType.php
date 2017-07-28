<?php

namespace BonnieresInformatique\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array('label'=> 'Nom', 'attr'=> array('class'=> 'form-control') ))
                ->add('email', TextType::class, array('label'=> 'Email', 'attr'=> array('class'=> 'form-control')))
                ->add('subject', TextType::class, array('label'=>'Sujet', 'attr'=> array('class'=> 'form-control')))
                ->add('body', TextareaType::class, array('label'=>'Message', 'attr'=> array('class'=> 'form-control')));
//                ->add('save', ButtonType::class,  array('attr'=> array('class'=> 'btn-primary')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonnieresInformatique\EcommerceBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonnieresinformatique_ecommercebundle_contact';
    }


}
