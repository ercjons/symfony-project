<?php

namespace BonnieresInformatique\EcommerceBundle\Controller;

use BonnieresInformatique\EcommerceBundle\Entity\Category;
use BonnieresInformatique\EcommerceBundle\Entity\Product;
use BonnieresInformatique\EcommerceBundle\Form\CategoryType;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class CategoryController extends Controller
{

    /**
     * @Template()
     */
    public function addCategoryAction(Request $request)
    {
        $user = $this->getUser();
        $category= new Category($user);
        $form = $this->createForm(CategoryType::class, $category);
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('EcommerceBundle:Category')->findAll();
        $formHandler = new FormHandler($form,$em,$request);
        if($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Ajout réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addCategory'));
        }
        return ['form'=>$form->createView(), 'category'=> $category];
    }

    /**
     * @Template()
     */
    public function editCategoryAction(Request $request, Category $category)
    {
        $form = $this->createForm(CategoryType::class, $category);
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('EcommerceBundle:Category')->findAll();
        $formHandler = new FormHandler($form,$em,$request);
        if($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Edition réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addCategory'));
        }
        return ['form'=>$form->createView(), 'category'=> $category];
    }

    public function deleteCategoryAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Suppression bien effectué');
        return $this->redirect($this->generateUrl('ecommerce_addCategory'));
    }

    public function sidebarLeftAction()
    {
        $em = $this->getDoctrine();
        $category = $em->getRepository('EcommerceBundle:Category')->findAll();
        return $this->render('EcommerceBundle:Partials/sidebar:sidebar_left.html.twig',['category'=>$category]);
    }
}