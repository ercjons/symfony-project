<?php

namespace BonnieresInformatique\EcommerceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', IntegerType::class)
//            ->add('validate')
//            ->add('orderDate')
            ->add('user', EntityType::class,
                array('label'=> 'Séléctionner un user',
                    'class'=>'BonnieresInformatique\UserBundle\Entity\User',
                    'attr'=> array('class'=>'form-control')))
            ->add('products', EntityType::class,
                array('label'=>'Séléctionner vos produits',
                    'class'=>'BonnieresInformatique\EcommerceBundle\Entity\Product','multiple'=>true,'expanded'=>true,
                    'attr'=>array('class'=>'form-control')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonnieresInformatique\EcommerceBundle\Entity\UserOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonnieresinformatique_ecommercebundle_userorder';
    }


}
