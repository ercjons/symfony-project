<?php
/**
 * Created by PhpStorm.
 * User: curtis
 * Date: 14/07/2017
 * Time: 15:58
 */

namespace BonnieresInformatique\EcommerceBundle\Controller;
use BonnieresInformatique\EcommerceBundle\Entity\UserOrder;
use BonnieresInformatique\EcommerceBundle\Form\UserOrderType;
use BonnieresInformatique\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserOrderController extends Controller
{
    /**
     * @Template()
     */
    public function addUserOrderAction(Request $request)
    {
        $user = get_current_user();
        $em = $this->getDoctrine()->getManager();
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {

            $userOrder = new UserOrder($user);
            $form = $this->createForm(UserOrderType::class, $userOrder);

            $formHandler = new FormHandler($form, $em, $request);
            if ($formHandler->process() == true) {
                $this->get('session')->getFlashBag()->add('success', 'Ajout réussi');
                return $this->redirect($this->generateUrl('ecommerce_addUserAddress'));
            }
            return ['form' => $form->createView(), 'userOrder'=> $userOrder];
        }
    }

}