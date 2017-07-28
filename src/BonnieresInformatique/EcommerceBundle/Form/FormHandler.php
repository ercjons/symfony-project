<?php
/**
 * Created by PhpStorm.
 * User: curtis
 * Date: 29/05/2017
 * Time: 20:12
 */

namespace BonnieresInformatique\EcommerceBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


class FormHandler
{


// Le formulaire à valider et enregistrer dans la DB
    protected $form;
    // Entity Manager de Doctrine
    protected $em;
    // Requête HTTP
    protected $request;

    /**
     * FormHandler constructor.
     * @param Form $form
     * @param EntityManager $em
     * @param Request $request
     */
    public function __construct(Form $form, EntityManager $em, Request $request)
    {
        $this->form = $form;
        $this->em = $em;
        $this->request = $request;
    }

    // Vérifier la validité du formulaire et hydrater l'objet si valide
    public function process() {
        // si formulaire validé
        if($this->request->getMethod()=='POST') {
            // faire l'association entre la superglobale $_POST dans request avec l'instanciation de l'entité à sauvegarder ex $draw->setTitle($_POST['title'])
            $this->form->handleRequest($this->request);
            // Si les données envoyées via le formulaire sont correctes (ex: bon format email, champs obligatoires etc.)
            if($this->form->isValid()) {
                $this->em->persist($this->form->getData());
                $this->em->flush();
                return true;
            }
        }
        return false;
    }
}