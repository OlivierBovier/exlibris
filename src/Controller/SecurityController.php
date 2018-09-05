<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class SecurityController extends AbstractController
{
    /**
    * @route("/inscription", name="security_registration")
    */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder) {
    	$user = new User();
    	
    	$form = $this->createForm(RegistrationType::class, $user);

    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()) {
    		$hash = $encoder->encodePassword($user, $user->getPassword());
    		$user->setPassword($hash);

    		$manager->persist($user);
    		$manager->flush();
    	}

    	return $this->render("security/registration.html.twig", [
    		'form' => $form->createView()
    	]);
    }
    /**
    * @route("/vosdonnees", name="security_update")
    */
    public function vosdonnees(User $user, Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder) {
    	//$user = new User();
    	

    	$form = $this->createForm(RegistrationType::class, $user);

    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()) {
    		$hash = $encoder->encodePassword($user, $user->getPassword());
    		$user->setPassword($hash);

    		$manager->persist($user);
    		$manager->flush();
    	}

    	return $this->render("security/registration.html.twig", [
    		'form' => $form->createView()
    	]);
    }

}
