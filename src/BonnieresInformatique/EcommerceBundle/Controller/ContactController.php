<?php
namespace BonnieresInformatique\EcommerceBundle\Controller;

use BonnieresInformatique\EcommerceBundle\Entity\Contact;
use BonnieresInformatique\EcommerceBundle\Form\ContactType;
use BonnieresInformatique\EcommerceBundle\Form\FormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContactController extends Controller
{

    /**
     * @Template
     */
    public function contactAction(Request $request)
    {
        //instanciation de la class Contact
        $contact = new Contact();

        //création du formulaire corrspondant
        $form = $this->createForm(ContactType::class, $contact);

        //on récupère l'entity manager
        $em = $this->getDoctrine()-> getManager();

        //on fait appel à la class FormHandler pour valider et
        // enrégistrer les données dans la base de données
        $formHandler = new FormHandler($form, $em, $request);
        if($formHandler ->process() == true){

            //swiftmailer
            $message = \Swift_Message::newInstance()
                    ->setSubject('contact')
                    ->setFrom('emiboyer75@gmail.com')
                    ->setTo('ercjons78@gmail.com')
                    ->setBody($this->renderView('@Ecommerce/Contact/contact.text.twig',
                    array('contact'=> $contact)));
            $this->get('mailer')->send($message);

            //message si tout se passe bien
            $this->get('session')->getFlashBag()->add('success', 'Envoie réussi' );

            //redirection vers la même page mais peut être modifier
            return $this->redirect($this->generateUrl('ecommerce_contact'));
        }
        return ['form' => $form -> createView()];
    }
}