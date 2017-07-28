<?php


namespace BonnieresInformatique\EcommerceBundle\Controller;

use BonnieresInformatique\EcommerceBundle\Entity\Brand;
use BonnieresInformatique\EcommerceBundle\Entity\Category;
use BonnieresInformatique\EcommerceBundle\Form\BrandType;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class BrandController extends  Controller
{
    /**
     * @Template
     */
    public function addBrandAction(Request $request)
    {
        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);
        $em = $this->getDoctrine()-> getManager();
        $brand = $em->getRepository('EcommerceBundle:Brand')->findAll();
        $formHandler = new FormHandler($form, $em, $request);
        if($formHandler ->process() == true){
            $this->get('session')->getFlashBag()->add('success', 'Ajout réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addBrand'));
        }
        return ['form' => $form -> createView(), 'brand'=> $brand];
    }

    /**
     * @Template
     */
    public function editBrandAction(Request $request, Brand $brand)
    {
        $form = $this->createForm(BrandType::class, $brand);
        $em = $this->getDoctrine()->getManager();
        $brand = $em->getRepository('EcommerceBundle:Brand')->findAll();
        $formHandler = new FormHandler($form,$em,$request);
        if($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Edition réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addBrand'));
        }
        return ['form'=>$form->createView(), 'brand'=> $brand];
    }


    public function deleteBrandAction(Brand $brand)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($brand);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Suppression bien effectué');
        return $this->redirect($this->generateUrl('ecommerce_addBrand'));
    }
}