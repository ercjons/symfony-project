<?php

namespace BonnieresInformatique\EcommerceBundle\Form;

use Doctrine\DBAL\Types\SmallIntType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FeatureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('os', TextType::class,array('required'=> false))
            ->add('cpu', TextType::class,array('required'=> false))
            ->add('cpuFrequency', TextType::class,array('required'=> false))
            ->add('graphicChipset', TextType::class,array('required'=> false))
            ->add('graphicCapacity', TextType::class,array('required'=> false))
            ->add('screenSize', IntegerType::class,array('required'=> false))
            ->add('screenType', TextType::class,array('required'=> false))
            ->add('ramCapacity', IntegerType::class,array('required'=> false))
            ->add('ramType', TextType::class,array('required'=> false))
            ->add('ramExpandable', IntegerType::class,array('required'=> false))
            ->add('ramSlot', IntegerType::class,array('required'=> false))
            ->add('hdCapacity', IntegerType::class,array('required'=> false))
            ->add('hdType', TextType::class,array('required'=> false))
            ->add('hardwareConnect', TextType::class,array('required'=> false))
            ->add('usbPort', TextType::class,array('required'=> false))
            ->add('displayPort', TextType::class,array('required'=> false))
            ->add('network', TextType::class,array('required'=> false))
            ->add('weight', TextType::class,array('required'=> false))
            ->add('rom', IntegerType::class,array('required'=> false))
            ->add('extendCard', IntegerType::class,array('required'=> false))
            ->add('frontCam', IntegerType::class,array('required'=> false))
            ->add('backCam', IntegerType::class,array('required'=> false))
            ->add('compatibility', TextType::class,array('required'=> false))
            ->add('hardSoft', TextType::class,array('required'=> false))
            ->add('pattern', TextType::class,array('required'=> false))
            ->add('material', TextType::class,array('required'=> false))
            ->add('cableLength', TextType::class,array('required'=> false))
            ->add('product', EntityType::class,
                array('label'=>"Type de produit",
                'class'=> 'BonnieresInformatique\EcommerceBundle\Entity\Product',
                'property'=> 'type',
                'attr'=> array('class'=>'form-control')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonnieresInformatique\EcommerceBundle\Entity\Feature'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonnieresinformatique_ecommercebundle_feature';
    }


}
