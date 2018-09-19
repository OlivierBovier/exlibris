<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Role;
use App\Form\RegistrationType;
use App\Form\ConnectionType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends AbstractController
{
    /**
    * @route("/inscription", name="security_registration")
    */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, Session $session, \Swift_Mailer $mailer) {
    	$user = new User();   	
    	$formRegistr = $this->createForm(RegistrationType::class, $user);
    	$formRegistr->handleRequest($request);

    	if ($formRegistr->isSubmitted() && $formRegistr->isValid()) {
    	    $hash = $encoder->encodePassword($user, $user->getPassword());
    		$user->setPassword($hash);

            $user->addRole('ROLE_USER');
            //$user->addRole('ROLE_ADMIN');

    		$manager->persist($user);
    		$manager->flush();

            $session->getFlashBag()->add('notice', 'Votre inscription est bien prise en compte. Merci. Vous pouvez maintenant vous connecter.');

            // Envoi d'un email de confirmation d'inscription
            $message = (new \Swift_Message('Confirmation d\'inscription'))
                ->setFrom(['exlibris.ifocop@free.fr' => 'ExLibris'])
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/registration.html.twig',
                        array('name' => $user->getUsername(), 'email' => $user->getEmail())
                    ),
                    'text/html'
                );
            $mailer->send($message);

            return $this->redirectToRoute("security_login");
    	}

    	return $this->render("security/registration.html.twig", [
    		'formRegistr' => $formRegistr->createView()
    	]);
    }

    /**
    * @route("/connexion", name="security_login")
    */
    public function login(Request $request, Session $session) {

        return $this->render("security/login.html.twig");
    }

    /**
    * @route("/deconnexion", name="security_logout")
    */
    public function logout() {}

}
