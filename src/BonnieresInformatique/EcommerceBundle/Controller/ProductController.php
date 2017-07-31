<?php

namespace BonnieresInformatique\EcommerceBundle\Controller;

use BonnieresInformatique\EcommerceBundle\Entity\Category;
use BonnieresInformatique\EcommerceBundle\Entity\Product;
use BonnieresInformatique\EcommerceBundle\Entity\Feature;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use BonnieresInformatique\EcommerceBundle\Form\ProductType;
use BonnieresInformatique\EcommerceBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class ProductController extends Controller
{
    public function productAction(Request $request)
    {
        //on crée une méthode qui permet de filtrer les produits pour chaque catégorie
        $em = $this->getDoctrine()->getManager();
        $productList = $em->getRepository('EcommerceBundle:Product')->findAll();

        $paginator = $this->get('knp_paginator');
        $product =  $paginator->paginate(
            $productList,
            $request->query->get('page', 1),5);

        return $this->render('EcommerceBundle:Product:product.html.twig',['product' => $product]);
    }


    public function showAction($id)
    {
        // cette méthode permet de voir la fiche d'un produit séléctionné
        $em = $this->getDoctrine()->getManager();

        //ici on récupére l'id du produit
        $product = $em->getRepository('EcommerceBundle:Product')->find($id);
        $feature = $em->getRepository('EcommerceBundle:Feature')->findAll();
//        retourne une erreur 404 au cas où un produit n'existe pas
        if(!$product) {
            throw $this->createNotFoundException('La page n\'existe pas');
        }

        // on retourne la vue du produit séléctionné
        return $this->render('EcommerceBundle:Product/template:show.html.twig', ['product'=>$product, 'feature'=>$feature]);
    }


    /**
     * @Template()
     */
    public function addProductAction(Request $request)
    {
        // ici on crée une méthode qui permet de créer ou d'ajouter un produit
            $product = new Product();
            $form = $this->createForm(ProductType::class, $product);
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('EcommerceBundle:Product')->findAll();
            $formHandler = new FormHandler($form, $em, $request);
            if ($formHandler->process() == true) {
                $this->get('session')->getFlashBag()->add('success', 'Ajout réussi');
                return $this->redirect($this->generateUrl('ecommerce_addProduct'));
            }
            return ['form' => $form->createView(), 'product'=> $product];
    }

    /**
     * @Template()
     */
    public function editProductAction(Request $request, Product $product)
    {
        // on crée une méthode qui permet d'éditer un produit existant
        $form = $this->createForm(ProductType::class, $product);
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('EcommerceBundle:Product')->findAll();
        $formHandler = new FormHandler($form,$em,$request);
        if($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Edition réussi' );
            return $this->redirect($this->generateUrl('ecommerce_addProduct'));
        }
        return ['form'=>$form->createView(), 'product'=> $product];
    }

    public function deleteProductAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'Le produit a bien été supprimé');
        return $this->redirect($this->generateUrl('ecommerce_addProduct'));
    }


    public function filterProductByCategoryAction(Request $request,Category $category)
    {
        //on crée une méthode qui permet de filtrer les produits pour chaque catégorie
        $em = $this->getDoctrine()->getManager();
        $productList = $em->getRepository('EcommerceBundle:Product')->findProductByCategory($category);
        $category = $em->getRepository('EcommerceBundle:Category')->find($category);

        $paginator = $this->get('knp_paginator');
        $product =  $paginator->paginate(
            $productList,
            $request->query->get('page', 1),2);


//        retourne une erreur 404 au cas où une catégorie n'existe pas
        if(!$category) {
            throw $this->createNotFoundException('La page n\'existe pas');
        }

        return $this->render('EcommerceBundle:Product:product.html.twig',['product' => $product, 'category'=>$category]);
    }

    public function searchAction()
    {
        // ici on crée le formulaire de recherche
        $form = $this->createForm(SearchType::class);

        //on retourne la vue du formulaire qui contient le champs recherche
        return $this->render('EcommerceBundle:Partials/search:search.html.twig', ['form'=> $form->createView()]);
    }

    public function searchProductAction(Request $request)
    {
        //ici on crée une méthode qui permet de récupérer les données
        // saisies dans le champs recherche
        $form = $this->createForm(SearchType::class);
        if($request->getMethod()=='POST'){
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $productList = $em->getRepository('EcommerceBundle:Product')->search($form['search']->getData());

            $paginator = $this->get('knp_paginator');
            $product =  $paginator->paginate(
                $productList,
                $request->query->get('page', 1),5);
        }else{
           // retourne une erreur 404
            throw $this->createNotFoundException('Impossible d\'afficher la page');
        }
        return $this->render('EcommerceBundle:Product:product.html.twig', ['product'=> $product]);
    }


}