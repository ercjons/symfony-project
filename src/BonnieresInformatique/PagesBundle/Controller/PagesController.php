<?php


namespace BonnieresInformatique\PagesBundle\Controller;


use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use BonnieresInformatique\PagesBundle\Entity\Page;
use BonnieresInformatique\PagesBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class PagesController extends Controller
{
    /**
     * @Template()
     */
    public function addPageAction(Request $request)
    {
        $page = new Page();
        $form = $this->createForm(PageType::class, $page);
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PagesBundle:Page')->findAll();
        $formHandler = new FormHandler($form, $em, $request);
        if ($formHandler->process() == true) {
            $this->get('session')->getFlashBag()->add('success', 'Ajout réussi');
            return $this->redirect($this->generateUrl('pages_addPage'));
        }
        return ['form' => $form->createView(), 'page'=> $page];
    }

    public function moduleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('PagesBundle:Page')->findAll();

        return $this->render('@Pages/Pages/module.html.twig', ['pages'=>$pages]);
    }

    public function pageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PagesBundle:Page')->find($id);

        return $this->render('@Pages/Pages/page.html.twig', ['page'=>$page]);
    }
}