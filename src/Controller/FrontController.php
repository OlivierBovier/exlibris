<?php
// src/Controller/FrontController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Livres;
use App\Entity\Auteurs;

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

        if (!$livresrecents) {
            throw $this->createNotFoundException(
                'Pas de livres récents dans notre base.'
            );
        }

        $livresconseilles = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findAllConseil();

        if (!$livresconseilles) {
            throw $this->createNotFoundException(
                'Pas de conseil de lecture en ce moment.'
            );
        }

        return $this->render('front/home.html.twig', ['livresrecents' => $livresrecents, 'livresconseilles' => $livresconseilles]);
    }


    /**
    * @Route("/catalog", name="front_catalog")
    */
    public function catalog()
    {
        return $this->render('front/catalog.html.twig');
    }

    /**
    * @Route("/fiche/{id}", name="front_fiche")
    */
    public function fiche($id)
    {
        $infolivre = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findOneById($id);

        dump($infolivre);

        return $this->render('front/fiche.html.twig', ['infolivre' => $infolivre]);
    }

    /**
    * @Route("/bio/{id}", name="front_bio")
    */
    public function bio($id)
    {
        $bio = $this->getDoctrine()
            ->getRepository(Auteurs::class)
            ->findOneById($id);

        dump($bio);

        return $this->render('front/bio.html.twig', ['bio' => $bio]);
    }

    /**
    * @Route("/mentions", name="front_mentions")
    */
    public function mentions()
    {
        return $this->render('front/mentions.html.twig');
    }

    /**
    * @Route("/infos-pratiques", name="front_infos_prat")
    */
    public function infos_prat()
    {
        return $this->render('front/infos_prat.html.twig');
    }


}
