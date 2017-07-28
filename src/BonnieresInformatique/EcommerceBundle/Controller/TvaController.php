<?php
/**
 * Created by PhpStorm.
 * User: curtis
 * Date: 08/07/2017
 * Time: 14:12
 */

namespace BonnieresInformatique\EcommerceBundle\Controller;
use BonnieresInformatique\EcommerceBundle\Entity\Tva;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use BonnieresInformatique\EcommerceBundle\Form\TvaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
class TvaController extends Controller
{
    /**
     * @Template()
     */
    public function addTvaAction(Request $request)
    {
        $tva = new Tva();
        $form = $this->createForm(TvaType::class, $tva);
        $em = $this->getDoctrine()-> getManager();
        $tva = $em->getRepository('EcommerceBundle:Tva')->findAll();
        $formHandler = new FormHandler($form, $em, $request);
        if($formHandler ->process() == true){
            $this->get('session')->getFlashBag()->add('success', 'Ajout réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addTva'));
        }
        return ['form' => $form -> createView(), 'tva'=>$tva];
    }
}