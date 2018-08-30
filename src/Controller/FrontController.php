<?php
// src/Controller/FrontController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    /**
    * @Route("/", name="app_front_home")
    */
    public function home()
    {
        return $this->render('front/home.html.twig');
    }
}
