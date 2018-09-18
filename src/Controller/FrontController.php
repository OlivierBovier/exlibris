<?php
// src/Controller/FrontController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Livres;
use App\Entity\Auteurs;
use App\Form\FiltreCatType;

class FrontController extends AbstractController
{
    /**
    * @Route("/", name="front_home")
    */
    public function home()
    {
        $livresrecents = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findRecent();

        if (!$livresrecents) {
            throw $this->createNotFoundException(
                'Pas de livres récents dans notre base.'
            );
        }

        $livresconseilles = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findConseil();

        if (!$livresconseilles) {
            throw $this->createNotFoundException(
                'Pas de conseil de lecture en ce moment.'
            );
        }

        return $this->render('front/home.html.twig', ['livresrecents' => $livresrecents, 'livresconseilles' => $livresconseilles]);
    }


    /**
    * @Route("/catalog/", name="front_catalog")
    */
    public function catalog(Request $request, ObjectManager $manager, Session $session, PaginatorInterface $paginator)
    {

        $formFiltre = $this->createForm(FiltreCatType::class);
        $formFiltre->handleRequest($request);        

        if ($formFiltre->isSubmitted() && $formFiltre->isValid()) {
            $filtres = $request->request->get('filtre_cat');
            $auteur = $filtres['auteur'];
            $categorie = $filtres['categorie'];
            $conseil = $filtres['est_conseil'];
            
            $catalog = $this->getDoctrine()
                ->getRepository(Livres::class)
                ->findWithFilter($auteur, $categorie, $conseil);

            if (!$catalog) {
                $session->getFlashBag()->add('notice', 'Aucun livre ne correspond à votre filtre.');
            }
        } else {
            $catalog = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findAllOrderRecent();

            if (!$catalog) {
                $session->getFlashBag()->add('notice', 'Le catalogue est vide.');
            }  
        }

        $pagination = $paginator->paginate(
            $catalog, 
            $request->query->getInt('page', 1)/*page number*/, 8/*limit per page*/
        );

        return $this->render('front/catalog.html.twig', ['formFiltre' => $formFiltre->createView(), 'pagination' => $pagination]);
    }


    /**
    * @Route("/fiche/{id}", name="front_fiche")
    */
    public function fiche($id, Session $session)
    {
        if (!$session->get('contenu_panier')) {
            $session->set('contenu_panier', array());
        }
        dump($session->get('contenu_panier'));
        $panier = $session->get('contenu_panier');

        $in_panier = isset($panier[$id]);

        $infolivre = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findOneById($id);

        return $this->render('front/fiche.html.twig', ['infolivre' => $infolivre, 'in_panier' => $in_panier]);
    }


    /**
    * @Route("/ajoutpanier/{id}/{qte}", name="front_ajoutpanier")
    */
    public function ajoutPanier(Request $request, ObjectManager $manager, Session $session)
    {
        if (!$session->get('contenu_panier')) {
            $session->set('contenu_panier', array());
        }

        $panier = $session->get('contenu_panier');
//        $panier[] = array($request->get('id'), $request->get('qte'));
        $panier[$request->get('id')] = $request->get('qte');/*array($request->get('id'), $request->get('qte'));*/

        $session->set('contenu_panier', $panier);

        return $this->redirectToRoute('front_fiche', array('id' => $request->get('id')));
    }

    /**
     * @Route("/panier/", name="front_panier")
     */
    public function panier(Request $request, ObjectManager $manager, Session $session)
    {
        if ($session->get('contenu_panier')) {
            $panier = $session->get('contenu_panier');

            $em = $this->getDoctrine()->getManager();
            $articles_paniers = $em->getRepository(Livres::class)->findById(array_keys($panier));

            return $this->render('front/panier.html.twig', ['articles_panier' => $articles_paniers]);
        } else {
            $session->getFlashBag()->add('notice', 'Votre panier est vide.');

            return $this->redirectToRoute("front_home");
        }
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
    * @Route("/mentions/", name="front_mentions")
    */
    public function mentions()
    {
        return $this->render('front/mentions.html.twig');
    }


    /**
    * @Route("/infos-pratiques/", name="front_infos_prat")
    */
    public function infos_prat()
    {
        return $this->render('front/infos_prat.html.twig');
    }


}
