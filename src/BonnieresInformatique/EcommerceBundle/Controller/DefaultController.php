<?php

namespace BonnieresInformatique\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EcommerceBundle:Default:index.html.twig');
    }

    public function sidebarLeftAction()
    {

        return $this->render('EcommerceBundle:Partials/sidebar:sidebar_left.html.twig');
    }

    public function serviceAction()
    {

        return $this->render('EcommerceBundle:Services:services.html.twig');
    }

    public function error404Action()
    {

        return $this->render('EcommerceBundle:Partials/error:error404.html.twig');
    }

}
