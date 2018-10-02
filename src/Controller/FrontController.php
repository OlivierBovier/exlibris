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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use App\Entity\Livres;
use App\Entity\Auteurs;
use App\Entity\Avis;
use App\Entity\Commandes;
use App\Entity\LignesCde;
use App\Entity\MouvStock;
use App\Entity\Actu;
use App\Form\FiltreAuteurType;
use App\Form\FiltreCategorieType;
use App\Form\AvisType;
use App\Form\ContactType;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front_home")
     */
    public function home()
    {
        $actus = $this->getDoctrine()
            ->getRepository(Actu::class)
            ->findRecent();

        $livresrecents = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findRecent();

        $livresconseilles = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findConseil();

        $venteparlivre = $this->getDoctrine()
            ->getRepository(LignesCde::class)
            ->venteParLivre();

        return $this->render('front/home.html.twig', [
            'actus' => $actus,
            'livresrecents' => $livresrecents,
            'livresconseilles' => $livresconseilles,
            'venteparlivre' => $venteparlivre
        ]);
    }

    /**
     * @Route("/actu/{id}", name="front_actu")
     */
    public function actu($id)
    {
        $actu = $this->getDoctrine()
            ->getRepository(Actu::class)
            ->findOneById($id);

        return $this->render('front/actu.html.twig', [
            'actu' => $actu
        ]);
    }


    /**
     * @Route("/catalog/", name="front_catalog")
     */
    public function catalog(Request $request, Session $session, PaginatorInterface $paginator)
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
    public function fiche(Request $request, $id, Session $session, ObjectManager $manager)
    {
        // Si pas de panier en session, on le crée (vide)
        if (!$session->get('contenu_panier')) {
            $session->set('contenu_panier', array());
        }

        // On récupère le livre par son id
        $infolivre = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findOneById($id);

        // Formulaire d'ajout au panier
        $formAddToCart = $this->createFormBuilder()
            ->add('qte', ChoiceType::class, array('label' => 'Quantité à commander', 'choices' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5)))
            ->add('save', SubmitType::class, array('label' => 'Ajouter au panier', 'attr' => array('class' => 'btn btn-success')))
            ->getForm();
        $formAddToCart->handleRequest($request);

        // Si le formulaire d'ajout au panier est posté...
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

            // On récupère le contenu du panier en session
            $panier = $session->get('contenu_panier');
            // On y rajoute une entrée (le nouveau livre)
            $panier[$id] = $ajouter_article;
            // Et on le réenregistre en session
            $session->set('contenu_panier', $panier);
        }

        // Booléen : panier existe ou non
        $in_panier = in_array($id, array_keys($session->get('contenu_panier')));

        // Récupération des avis existants concernant le livre
        $liste_avis = $this->getDoctrine()
            ->getRepository(Avis::class)
            ->findByLivres($id);

        // Permet de savoir si l'utilisateur loggé à déjà posté un avis pour ce livre
        $avis_existant = $this->getDoctrine()
            ->getRepository(Avis::class)
            ->findBy(['livre' => $infolivre, 'user' => $this->getUser()]);

        $formAvis = $this->createForm(AvisType::class);
        $formAvis->handleRequest($request);

        if ($formAvis->isSubmitted() && $formAvis->isValid()) {
            $formAvisData = $formAvis->getData();
            $avis = new Avis();
            $avis->setCommentaire($formAvisData->getCommentaire());
            $avis->setNote($formAvisData->getNote());
            $avis->setDateAvis(new \DateTime());
            $avis->setLivre($infolivre);
            $avis->setUser($this->getUser());

            $manager->persist($avis);
            $manager->flush();

            return $this->redirectToRoute("front_fiche", ['id' => $id]);
        }

        $suggestion_livres = $this->getDoctrine()
            ->getRepository(Livres::class)
            ->findSuggestion($id, $infolivre->getCategorie());


        return $this->render('front/fiche.html.twig', [
            'infolivre' => $infolivre,
            'in_panier' => $in_panier,
            'liste_avis' => $liste_avis,
            'formAddToCart' => $formAddToCart->createView(),
            'formAvis' => $formAvis->createView(),
            'avis_existant' => $avis_existant,
            'suggestion_livres' => $suggestion_livres
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

            $prix_total_ht_panier = $prix_total_ttc_panier / 1.055;
            $tva = $prix_total_ttc_panier - $prix_total_ht_panier;

            $formChangeAdresse = $this->createFormBuilder()
                ->add('destinataire', TextType::class, array('required' => false))
                ->add('adresse', TextType::class, array('required' => false))
                ->add('codepostal', TextType::class, array('required' => false))
                ->add('ville', TextType::class, array('required' => false))
                ->add('ValidCommand', SubmitType::class, array('label' => 'Valider votre commande', 'attr' => array('class' => 'btn btn-success')))
                ->getForm();
            $formChangeAdresse->handleRequest($request);

            if ($formChangeAdresse->isSubmitted() && $formChangeAdresse->isValid()) {

                $changeAdresse = $formChangeAdresse->getData();
                $session->set('chgt_addresse_livr', false);

                if ($changeAdresse['destinataire'] || $changeAdresse['adresse'] || $changeAdresse['codepostal'] || $changeAdresse['ville']) {
                    $user = $this->getUser();
                    dump($user);
                    $user->setDestLiv($changeAdresse['destinataire']);
                    $user->setAdresseLiv($changeAdresse['adresse']);
                    $user->setCodepostalLiv($changeAdresse['codepostal']);
                    $user->setVilleLiv($changeAdresse['ville']);
                    $manager->persist($user);

                    $session->set('chgt_addresse_livr', true);
                }

                $commande = new Commandes();
                $commande->setUser($this->getUser());
                $commande->setDateCde(new \DateTime());
                $commande->setTotalHtCde($prix_total_ht_panier);
                $commande->setTvaCde($tva);
                $commande->setTotalTtcCde($prix_total_ttc_panier);
                $manager->persist($commande);

                foreach($session->get('contenu_panier') as $lignepanier) {
                    $lignecde = new LignesCde();
                    $livre = $this->getDoctrine()
                        ->getRepository(Livres::class)
                        ->find($lignepanier['id']);
                    $prixparqte = $lignepanier['qte'] * $livre->getPrixTtc();

                    $lignecde->setLivre($livre);
                    $lignecde->setCommande($commande);
                    $lignecde->setQteLigneCde($lignepanier['qte']);
                    $lignecde->setPrixParQte($prixparqte);
                    $manager->persist($lignecde);

                    $mvStock = new MouvStock();
                    $mvStock->setLivre($livre);
                    $mvStock->setQteMouv($lignepanier['qte'] * -1);
                    $mvStock->setCreatedAt(new \DateTime());
                    $manager->persist($mvStock);
                }

                $manager->flush();

                    dump($changeAdresse);
                    dump($session->get('contenu_panier'));
                    dump($prix_total_ht_panier);
                    dump($tva);
                    dump($prix_total_ttc_panier);
                    dump($commande->getId());
                    return $this->redirectToRoute("front_facture", array('id' => $commande->getId()));
            }

            return $this->render('front/panier.html.twig', [
                'articles_panier' => $articles_panier,
                'prix_total_ttc_panier' => $prix_total_ttc_panier,
                'tva' => $tva,
                'prix_total_ht_panier' => $prix_total_ht_panier,
                'formEraseCart' => $formEraseCart->createView(),
                'formChangeAdresse' => $formChangeAdresse->createView()
            ]);

        } else {
            $session->getFlashBag()->add('notice', 'Votre panier est vide.');

            return $this->redirectToRoute("front_home");
        }
    }

    /**
     * @Route("/facture/{id}", name="front_facture")
     */
    public function facture($id, Session $session)
    {
        $commande = $this->getDoctrine()
            ->getRepository(Commandes::class)
            ->findOneById($id);

        $lignesCde = $this->getDoctrine()
            ->getRepository(LignesCde::class)
            ->findByCommande($id);

        $session->remove('contenu_panier');

        return $this->render('front/facture.html.twig', [
            'commande' => $commande,
            'chgt_addresse_livr' => $session->get('chgt_addresse_livr'),
            'lignesCde' => $lignesCde
        ]);
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
     * @Route("/espaceclient/{id}", name="front_espaceclient")
     */
    public function espaceclient($id)
    {
        $user = $this->getUser();
        if ($id == $user->getId()) {
            $bad_url = false;
            $commandes = $this->getDoctrine()
                ->getRepository(Commandes::class)
                ->findByUser($id);
        } else {
            $bad_url = true;
            $commandes = false;
        }

        return $this->render('front/espaceclient.html.twig', [
            'commandes' => $commandes,
            'bad_url' => $bad_url
            ]);
    }

    /**
     * @Route("/mentions/", name="front_mentions")
     */
    public function mentions()
    {


        return $this->render('front/mentions.html.twig');
    }


    /**
     * @Route("/contact/", name="front_contact")
     */
    public function contact(Request $request, Session $session, \Swift_Mailer $mailer)
    {
        
        $formContact = $this->createForm(ContactType::class);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()) {
            
            $contenu_form = $formContact->getData();

            // Envoi de l'email de contact à l'administrateur du site
            $message = (new \Swift_Message('Contact depuis le site ExLibris'))
                ->setFrom(['exlibris.ifocop@free.fr' => 'ExLibris'])
                ->setTo('olivier.bovier@free.fr')
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        array('nom' => $contenu_form['nom'], 'email' => $contenu_form['email'], 'objet' => $contenu_form['objet'], 'contenu' => $contenu_form['contenu'])
                    ),
                    'text/html'
                );
            $mailer->send($message);

            $session->getFlashBag()->add('notice', 'Votre demande est bien prise en compte. Merci.');

            return $this->redirectToRoute("front_home");

        }

        return $this->render('front/contact.html.twig', [
            'formContact' => $formContact->createView()
        ]);
    }

    /**
    * @Route("/cgv/", name="front_cgv")
    */
    public function cgv()
    {
        return $this->render('front/cgv.html.twig');
    }

    /**
     * @Route("/qui/", name="front_qui")
     */
    public function qui()
    {
        return $this->render('front/qui.html.twig');
    }


}
