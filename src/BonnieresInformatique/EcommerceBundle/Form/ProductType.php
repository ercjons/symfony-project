<?php

namespace BonnieresInformatique\EcommerceBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',TextType::class)
            ->add('name',TextType::class)
            ->add('description',TextareaType::class)
            ->add('price',TextType::class)
//            ->add('available')
//            ->add('listingDate')
            ->add('guarantee', TextType::class)
            ->add('category', EntityType::class,
                array('label' => "Séléctionner une categorie:",
                'class' => 'BonnieresInformatique\EcommerceBundle\Entity\Category',
                'property' => 'name',
                'attr' => array('class' => 'form-control')))
            ->add('brand', EntityType::class,
                array('label'=> "Séléctionner une marque:",
                'class' => 'BonnieresInformatique\EcommerceBundle\Entity\Brand',
                'property' => 'name',
                'attr' => array('class' => 'form-control')))
            ->add('file', FileType::class)
            ->add('tva', EntityType::class,
                array('label'=>"Sélectionner un tva",
                'class'=> 'BonnieresInformatique\EcommerceBundle\Entity\Tva',
                'property'=> 'name',
                'attr'=> array('class'=>'form-control')));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonnieresInformatique\EcommerceBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonnieresinformatique_ecommercebundle_product';
    }


}
