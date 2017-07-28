<?php

namespace BonnieresInformatique\EcommerceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CartController extends Controller
{
    public function cartAction()
    {
      return  $this->render('@Ecommerce/Administration/user/cart.html.twig');
    }

    public function addCartAction()
    {


      return  $this->redirect($this->generateUrl('ecommerce_cart'));
    }

    public function validateAction()
    {
      return  $this->render('@Ecommerce/Administration/user/validate.html.twig');
    }
}