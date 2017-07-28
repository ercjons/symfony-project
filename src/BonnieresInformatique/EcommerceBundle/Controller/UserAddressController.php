<?php
/**
 * Created by PhpStorm.
 * User: curtis
 * Date: 08/07/2017
 * Time: 17:20
 */

namespace BonnieresInformatique\EcommerceBundle\Controller;
use BonnieresInformatique\EcommerceBundle\Entity\UserAddress;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use BonnieresInformatique\EcommerceBundle\Form\UserAddressType;
use BonnieresInformatique\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserAddressController extends Controller
{
    /**
     * @Template()
     */
    public function addUserAddressAction(Request $request)
    {
        $user = get_current_user();
        $em = $this->getDoctrine()->getManager();
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {

            $userAddress = new UserAddress($user);
            $form = $this->createForm(UserAddressType::class, $userAddress);

            $formHandler = new FormHandler($form, $em, $request);
            if ($formHandler->process() == true) {
                $this->get('session')->getFlashBag()->add('success', 'Ajout réussi');
                return $this->redirect($this->generateUrl('ecommerce_addUserAddress'));
            }
            return ['form' => $form->createView(), 'userAddress' => $userAddress];
        }
    }




}