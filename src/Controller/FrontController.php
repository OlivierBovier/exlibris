<?php
// src/Controller/FrontController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Livres;

class FrontController extends AbstractController
{
    /**
    * @Route("/", name="front_home")
    */
    public function home()
    {
        $livresrecents = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findAllRecent();

        dump($livresrecents);

        if (!$livresrecents) {
            throw $this->createNotFoundException(
                'Pas de livres récents dans notre base.'
            );
        }

        return $this->render('front/home.html.twig', ['livresrecents' => $livresrecents]);
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

    /**
    * @Route("/mentions", name="mentions")
    */
    public function mentions()
    {
        return $this->render('front/mentions.html.twig');
    }

    /**
    * @Route("/infos-pratiques", name="infos_prat")
    */
    public function infos_prat()
    {
        return $this->render('front/infos_prat.html.twig');
    }


}
