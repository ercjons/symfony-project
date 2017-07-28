<?php


namespace BonnieresInformatique\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $user= $this->getUser();
        return $this->render('@Ecommerce/Administration/admin/index.html.twig', ['user', $user]);
    }
}