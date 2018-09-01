<?php
// src/Controller/FrontController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    /**
    * @Route("/", name="front_home")
    */
    public function home()
    {
        return $this->render('front/home.html.twig');
    }

    /**
    * @Route("/catalog", name="catalog")
    */
    public function catalog()
    {
        return $this->render('front/catalog.html.twig');
    }

    /**
    * @Route("/fiche/{id}", name="fiche")
    */
    public function fiche()
    {
        return $this->render('front/fiche.html.twig');
    }


}
