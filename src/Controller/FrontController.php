<?php
// src/Controller/FrontController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Livres;
use App\Entity\Auteurs;
use App\Entity\Avis;
use App\Form\FiltreAuteurType;
use App\Form\FiltreCategorieType;

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

        $formFiltreAuteur = $this->createForm(FiltreAuteurType::class);
        $formFiltreAuteur->handleRequest($request);
        $formFiltreCategorie = $this->createForm(FiltreCategorieType::class);
        $formFiltreCategorie->handleRequest($request);        

        if ($formFiltreAuteur->isSubmitted() && $formFiltreAuteur->isValid()) {
            $filtres = $request->request->get('filtre_auteur');
            $auteur = $filtres['auteur'];
            
            $catalog = $this->getDoctrine()
                ->getRepository(Livres::class)
                ->findBy(['auteur' => $auteur], ['date_parution' => 'DESC']);

            if (!$catalog) {
                $session->getFlashBag()->add('notice', 'Aucun livre ne correspond à votre filtre.');
            }

        } elseif ($formFiltreCategorie->isSubmitted() && $formFiltreCategorie->isValid()) {
            $filtres = $request->request->get('filtre_categorie');
            $categorie = $filtres['categorie'];
            
            $catalog = $this->getDoctrine()
                ->getRepository(Livres::class)
                ->findBy(['categorie' => $categorie], ['date_parution' => 'DESC']);

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

        $nbrLivres = count($catalog);

        $pagination = $paginator->paginate(
            $catalog, 
            $request->query->getInt('page', 1)/*page number*/, 8/*limit per page*/
        );

        return $this->render('front/catalog.html.twig', [
            'formFiltreAuteur' => $formFiltreAuteur->createView(),
            'formFiltreCategorie' => $formFiltreCategorie->createView(),
            'pagination' => $pagination,
            'nbrLivres' => $nbrLivres
        ]);
    }


    /**
    * @Route("/fiche/{id}", name="front_fiche")
    */
    public function fiche(Request $request, $id, Session $session)
    {
        if (!$session->get('contenu_panier')) {
            $session->set('contenu_panier', array());
        }

        $infolivre = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findOneById($id);

        $formAddToCart = $this->createFormBuilder()
            ->add('qte', ChoiceType::class, array('label' => 'Quantité à commander', 'choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5 )))
            ->add('save', SubmitType::class, array('label' => 'Ajouter au panier', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();
        $formAddToCart->handleRequest($request);

        if ($formAddToCart->isSubmitted() && $formAddToCart->isValid()) {
            $qte_produit = $formAddToCart->getData();
            $qte_produit = intval($qte_produit['qte']);
            $pxttc = $infolivre->getprixTtc();
            $prix_total_ttc = $qte_produit * $pxttc;
            $ajouter_article = [
                'id' => $id,
                'titre' => $infolivre->getTitre(),
                'image' => $infolivre->getImage(),
                'qte' => $qte_produit,
                'prixttc' => $pxttc,
                'prix_total_ttc' => $prix_total_ttc
            ];

            $panier = $session->get('contenu_panier');
            $panier[$id] = $ajouter_article;
            $session->set('contenu_panier', $panier);
        }

        $in_panier = in_array($id, array_keys($session->get('contenu_panier')));

        $liste_avis = $this->getDoctrine()
            ->getRepository(Avis::class)
            ->findByLivres($id);
        dump($liste_avis);

        return $this->render('front/fiche.html.twig', [
            'infolivre' => $infolivre,
            'in_panier' => $in_panier,
            'liste_avis' => $liste_avis,
            'formAddToCart' => $formAddToCart->createView()
        ]);
    }


    /**
     * @Route("/panier/", name="front_panier")
     */
    public function panier(Request $request, ObjectManager $manager, Session $session)
    {
        $formEraseCart = $this->createFormBuilder()
            ->add('save', SubmitType::class, array('label' => 'Supprimer votre panier', 'attr' => array('class' => 'btn btn-secondary')))
            ->getForm();
        $formEraseCart->handleRequest($request);

        if ($formEraseCart->isSubmitted() && $formEraseCart->isValid()) {
            $session->remove('contenu_panier');
        }

        if ($session->get('contenu_panier')) {


            $articles_panier = $session->get('contenu_panier');

            $prix_total_ttc_panier = 0;
            foreach ($articles_panier as $valeurs) {
                $prix_total_ttc = $valeurs['prix_total_ttc'];
                $prix_total_ttc_panier += $prix_total_ttc;
            }

            $prix_total_ht_panier = $prix_total_ttc_panier / 1.20;
            $tva = $prix_total_ttc_panier - $prix_total_ht_panier;

            return $this->render('front/panier.html.twig', [
                'articles_panier' => $articles_panier,
                'prix_total_ttc_panier' => $prix_total_ttc_panier,
                'tva' => $tva,
                'prix_total_ht_panier' => $prix_total_ht_panier,
                'formEraseCart' => $formEraseCart->createView()
            ]);
        } else {
            $session->getFlashBag()->add('notice', 'Votre panier est vide.');

            return $this->redirectToRoute("front_home");
        }
    }

    /**
     * @Route("/incrementartpanier/{id}", name="front_incrementartpanier")
     */
    public function incrementArtPanier($id, Session $session)
    {
        $modifPanier = $this->VarQteArtPanier($id, 1, $session);

        return $this->redirectToRoute("front_panier");
    }

    /**
     * @Route("/decrementartpanier/{id}", name="front_decrementartpanier")
     */
    public function decrementArtPanier($id, Session $session)
    {
        $modifPanier = $this->VarQteArtPanier($id, -1, $session);

        return $this->redirectToRoute("front_panier");
    }

    public function VarQteArtPanier($id, $qte, Session $session)
    {
        $articles_panier = $session->get('contenu_panier');
        $qte_a_modif = $articles_panier[$id]['qte'];
        $qte_a_modif += $qte;
        $articles_panier[$id]['qte'] = $qte_a_modif;
        $articles_panier[$id]['prix_total_ttc'] = $qte_a_modif * $articles_panier[$id]['prixttc'];
        $session->set('contenu_panier', $articles_panier);
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
