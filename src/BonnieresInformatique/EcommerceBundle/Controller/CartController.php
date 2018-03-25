<?php

namespace BonnieresInformatique\EcommerceBundle\Controller;
use BonnieresInformatique\EcommerceBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CartController extends Controller
{
    public function cartAction()
    {
        $session = $this->get('request')->getSession();
        if (!$session->has('cart')) $session->set('cart', array());

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('EcommerceBundle:Product')->findArray(array_keys($session->get('cart')));

      return  $this->render('@Ecommerce/Administration/user/cart.html.twig', ['product'=>$product, 'cart' => $session->get('cart')]);
    }

    public function addCartAction($id)
    {
        $session = $this->get('request')->getSession();

        if (!$session->has('cart')) $session->set('cart',array());
        $cart = $session->get('cart');

        if (array_key_exists($id,$cart)) {
            if ($this->get('request')->query->get('quantity') != null) $cart[$id] = $this->get('request')->query->get('quantity');
//            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } else {
            if ($this->get('request')->query->get('quantity') != null)
                $cart[$id] = $this->get('request')->query->get('quantity');
            else
                $cart[$id] = 1;
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
        }

        $session->set('cart',$cart);
      return  $this->redirect($this->generateUrl('ecommerce_cart'));
    }

    public function deleteCartAction($id)
    {
        $session = $this->get('request')->getSession();
        $cart = $session->get('cart');

        if (array_key_exists($id, $cart))
        {
            unset($cart[$id]);
            $session->set('cart',$cart);
//            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('ecommerce_cart'));
    }

    public function validateAction()
    {
      return  $this->render('@Ecommerce/Administration/user/validate.html.twig');
    }
}