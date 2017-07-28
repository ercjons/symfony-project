<?php
/**
 * Created by PhpStorm.
 * User: curtis
 * Date: 15/07/2017
 * Time: 17:32
 */

namespace BonnieresInformatique\EcommerceBundle\Controller;
use BonnieresInformatique\EcommerceBundle\Entity\Feature;
use BonnieresInformatique\EcommerceBundle\Form\FeatureType;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class FeatureController extends  Controller
{
    /**
     * @Template()
     */
    public function addFeatureAction(Request $request)
    {
        // ici on crée une méthode qui permet de créer ou d'ajouter un caractéristique
        $feature = new Feature();
        $form = $this->createForm(FeatureType::class, $feature);
        $em = $this->getDoctrine()->getManager();
        $feature = $em->getRepository('EcommerceBundle:Feature')->findAll();
        $formHandler = new FormHandler($form, $em, $request);
        if ($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Ajout réussi');
            return $this->redirect($this->generateUrl('ecommerce_addFeature'));
        }
        return ['form' => $form->createView(), 'feature'=> $feature];
    }
}