<?php
// src/DataFixtures/LivresFixtures.php
namespace App\DataFixtures;

use App\Entity\Livres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LivresFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $miserables = new Livres();

        $miserables->setISBN('978-2-253-09633-7');
        $miserables->setTitre('Les Misérables');
        $miserables->setNbPages(992);
        $miserables->setDateParution(\DateTime::createFromFormat('Y-m-d', "1862-03-30"));
        $miserables->setPrixHt(12.5);
        $miserables->setEstConseil(1);
        $miserables->setResume('Peut-on imaginer un monde sans Jean Valjean, Cosette, Gavroche, Javert ou Fantine, à jamais vivants au Panthéon de l\'esprit humain ? En 1862 paraissent Les Misérables, qui désignent toutes les victimes d\'un ordre social dont Victor Hugo condamne les injustices. Immense épopée populaire, le roman est emporté dans l\'air de Paris et de ses bas-fonds, l\'odeur des barricades et de la Révolution. Il deviendra l\'une des œuvres les plus lues dans le monde. On dit que lorsque les premières épreuves sortaient des presses, les correcteurs et les imprimeurs pleuraient.');
        $miserables->setImage('les_miserables.jpg');
        $miserables->setAuteur($this->getReference(AuteursFixtures::HUGO));
        $miserables->setEditeur($this->getReference(EditeursFixtures::FLAMMARION));
        $miserables->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $miserables->setActive(true);
        $manager->persist($miserables);

        $particule = new Livres();

        $particule->setISBN('978-2-080-67472-2');
        $particule->setTitre('Les Particules élémentaires');
        $particule->setNbPages(317);
        $particule->setDateParution(\DateTime::createFromFormat('Y-m-d', "1998-08-24"));
        $particule->setPrixHt(8.10);
        $particule->setEstConseil(1);
        $particule->setResume('Michel, chercheur en biologie rigoureusement déterministe, incapable d\'aimer, gère le déclin de sa sexualité en se consacrant au travail, à son Monoprix et aux tranquillisants. Une année sabbatique donne à ses découvertes un tour qui bouleversera la face du monde. Bruno, de son côté, s\'acharne en une quête désespérée du plaisir sexuel. Un séjour au " Lieu du Changement ", camping post-soixante-huitard tendance New Age, changera-t-il sa vie ? Un soir, une inconnue à la bouche hardie lui fait entrevoir la possibilité pratique du bonheur. Par leur parcours familial et sentimental chaotique, les deux demi-frères illustrent de manière exemplaire la société d\'aujourd\'hui et la quête complexe de l\'amour vrai.');
        $particule->setImage('les_particules_elementaires.jpg');
        $particule->setAuteur($this->getReference(AuteursFixtures::HOUELLEBECQ));
        $particule->setEditeur($this->getReference(EditeursFixtures::FLAMMARION));
        $particule->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $particule->setActive(true);
        $manager->persist($particule);

        $extension = new Livres();

        $extension->setISBN('978-2-290-34952-6');
        $extension->setTitre('Extension du domaine de la lutte');
        $extension->setNbPages(156);
        $extension->setDateParution(\DateTime::createFromFormat('Y-m-d', "1994-08-01"));
        $extension->setPrixHt(12);
        $extension->setEstConseil(1);
        $extension->setResume('Le héros a trente ans. Cadre moyen, analyste-programmeur dans une société informatique, son salaire net atteint 2,5 fois le SMIC. Malgré cette insertion sociale, il n’attire pas les femmes. Dépourvu de beauté comme de charme, sujet à de fréquents accès dépressifs, il ne correspond guère à ce que les femmes recherchent en priorité sur le marché du sexe ou de la satisfaction narcissique. On ne connaît pas son nom mais personne ne semble s’en soucier. Joueur disqualifié mais spectateur perspicace de cette partie de faux-semblants qu’est la vie moderne occidentale, le narrateur décrit la lutte quotidienne de ses congénères, toujours en quête d’un peu d’amour, de plaisir, d’argent. Cette lutte, étendue à tous les aspects de la vie humaine sous l’influence du modèle libéral, transforme le moindre de nos gestes en un combat épique, au terme duquel notre position dans la société humaine est corrigée, à la hausse ou à la baisse. Même nos lits ne sont plus un refuge. Il faut s’y distinguer. La sexualité est un système de hiérarchie sociale. Résigné, le narrateur se place définitivement en dehors de cette lutte, enfermé dans la nostalgie de l’adolescence, son récit ne faisant toutefois jamais allusion à ses parents (sauf pour décrire rapidement la scène de sa conception) il souhaite parfois la mort sans pouvoir s’y résoudre. Souvent, son entourage fait preuve d’un dynamisme de façade qui tranche avec sa propre neurasthénie. Pourtant, le désenchantement survient toujours, comme s’il était impossible – ou risible – de s’impliquer dans le monde. Le narrateur décrit ainsi le décalage entre la projection existentielle d’un de ses amis et la réalité de sa vie quotidienne, mettant en perspective son idéologie élitiste et la médiocrité d’un célibat sans issue.');
        $extension->setImage('extension_domaine_lutte.jpg');
        $extension->setAuteur($this->getReference(AuteursFixtures::HOUELLEBECQ));
        $extension->setEditeur($this->getReference(EditeursFixtures::FLAMMARION));
        $extension->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $extension->setActive(true);
        $manager->persist($extension);

        $asonimage = new Livres();

        $asonimage->setISBN('978-2-330-10944-8');
        $asonimage->setTitre('A son image');
        $asonimage->setNbPages(317);
        $asonimage->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-08-22"));
        $asonimage->setPrixHt(19.50);
        $asonimage->setEstConseil(0);
        $asonimage->setResume('Ce somptueux roman en forme de requiem pour une photographe défunte est aussi l’occasion d’évoquer le nationalisme corse, la violence des guerres modernes et les liens ambigus qu’entretiennent l’image, la photographie, le réel et la mort.');
        $asonimage->setImage('a_son_image.jpg');
        $asonimage->setAuteur($this->getReference(AuteursFixtures::FERRARI));
        $asonimage->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $asonimage->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $asonimage->setActive(true);
        $manager->persist($asonimage);

        $sermon = new Livres();

        $sermon->setISBN('978-2-330-02280-8');
        $sermon->setTitre('Le sermon sur la chute de Rome');
        $sermon->setNbPages(208);
        $sermon->setDateParution(\DateTime::createFromFormat('Y-m-d', "2013-08-17"));
        $sermon->setPrixHt(7.7);
        $sermon->setEstConseil(1);
        $sermon->setResume('Dans un village corse perché loin de la côte, le bar local est en train de connaître une mutation profonde sous l\'impulsion de ses nouveaux gérants. A la sur-prise générale, ces deux enfants du pays ont tourné le dos à de prometteuses études de philosophie sur le continent pour, fidèles aux enseignements de Leibniz, transformer un modeste débit de boissons en "meilleur des mondes possibles". Mais c\'est bientôt l\'enfer en personne qui s\'invite au comptoir, réactivant les blessures anciennes d\'êtres assujettis à d\'indigents rêves de bonheur et victimes, à leur insu, de la tragique propension de l\'âme humaine à se corrompre. Entrant par-delà les siècles en résonance avec le sermon par lequel saint Augustin tenta de consoler ses fidèles de la fragilité des royaumes terrestres, Jérôme Ferrari jette, au fil d\'une écriture somptueuse, une lumière impitoyable sur la malédiction qui condamne les mortels à voir s\'effondrer les mondes qu\'ils édifient et à refonder sans trêve, sur le sang ou les larmes, leurs impossibles mythologies.');
        $sermon->setImage('sermon_chute_rome.jpg');
        $sermon->setAuteur($this->getReference(AuteursFixtures::FERRARI));
        $sermon->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $sermon->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $sermon->setActive(true);
        $manager->persist($sermon);

        $passagers = new Livres();

        $passagers->setISBN('978-2-723-40132-4');
        $passagers->setTitre('Les Passagers du Vent - La Fille sous la dunette');
        $passagers->setNbPages(48);
        $passagers->setDateParution(\DateTime::createFromFormat('Y-m-d', "1980-01-01"));
        $passagers->setPrixHt(14.5);
        $passagers->setEstConseil(1);
        $passagers->setResume('"La Fille sous la dunette" est le premier des cinq tomes des "Passagers du Vent", série créée par François Bourgeon. XVIIIe siècle, à bord d\'un navire. Hoël Tragan aperçoit deux jeunes femmes sous la dunette. Piqué par la curiosité, il s\'aventure dans la zone interdite à l\'équipage. Repéré, il est arrêté et mis aux fers. Il reçoit alors la visite d\'un "jeune homme" qui s\'avère être Isa, l\'une des filles qu\'il avait vues. Isa lui racontera comment, jeune enfant, elle avait changé d\'identité avec son amie par jeu, ce qui lui valut de perdre son titre de noblesse. Après diverses péripéties, notamment un combat contre des vaisseaux britanniques, Hoël est fait prisonnier par la Royal Navy...');
        $passagers->setImage('passagers_du_vent.jpg');
        $passagers->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers->setCategorie($this->getReference(CategoriesFixtures::BD));
        $passagers->setActive(true);
        $manager->persist($passagers);

        $meilleurmonde = new Livres();

        $meilleurmonde->setISBN('978-2-266-28303-8');
        $meilleurmonde->setTitre('Le meilleur des mondes');
        $meilleurmonde->setNbPages(320);
        $meilleurmonde->setDateParution(\DateTime::createFromFormat('Y-m-d', "1932-01-01"));
        $meilleurmonde->setPrixHt(4.95);
        $meilleurmonde->setEstConseil(1);
        $meilleurmonde->setResume('Demain, le bonheur sera universel. Et obligatoire ! Dans le meilleur des mondes les foetus sont « préparés» dans des incubatrices en fonction du rôle qu\'on leur destine. Les futurs Alphas, de la caste des élites, reçoivent plus d\'oxygène, plus de «pseudo sang». Quant aux futurs Epsilons, à qui l\'on réserve les tâches les plus pénibles, on veille à ne pas développer leurs facultés intellectuelles : un bon ouvrier n\'a pas besoin de penser. Dans le meilleur des mondes, un système éducatif qui façonne les esprits comme les corps, une société communautaire qui proscrit l\'individualisme, où la cellule familiale ne peut exister. Dans ce meilleur des mondes méthodiquement planifié pour construire les hommes en fonction des besoins, pour contraindre un bonheur artificiel, pour museler les passions et les interrogations, il y aura bien un grain de sable pour s\'insérer dans les rouages. Un récit incontournable écrit en 1931, qui n\'a pas fini d\'influencer écrivains et cinéastes. ');
        $meilleurmonde->setImage('meilleur_des_mondes.jpg');
        $meilleurmonde->setAuteur($this->getReference(AuteursFixtures::HUXLEY));
        $meilleurmonde->setEditeur($this->getReference(EditeursFixtures::POCKET));
        $meilleurmonde->setCategorie($this->getReference(CategoriesFixtures::ANTICIPATION));
        $meilleurmonde->setActive(true);
        $manager->persist($meilleurmonde);

        $penseauxpierres = new Livres();

        $penseauxpierres->setISBN('978-2-864-32987-9');
        $penseauxpierres->setTitre('Pense aux pierres sous tes pas');
        $penseauxpierres->setNbPages(192);
        $penseauxpierres->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-08-23"));
        $penseauxpierres->setPrixHt(15);
        $penseauxpierres->setEstConseil(1);
        $penseauxpierres->setResume('Dans un pays dont on ignore le nom, où se succèdent des dictateurs qui tentent de le moderniser, une soeur et son frère jumeau vivent à la ferme de leurs parents, au milieu des plaines. Marcio travaille aux champs avec le père, un homme violent, tandis que Léonora s\'occupe de la maison avec sa mère. Ils ont douze ans à peine et leur complicité semble totale, leurs jeux interdits irrépressibles. Mais un soir, alors que leurs corps se rapprochent doucement dans le fenil, le père surgit et voit se confirmer ce qu\'il a toujours suspecté. Tandis qu\'un nouveau coup d\'Etat vient de se produire, les parents décident de séparer les jumeaux. Commence alors un combat long et incertain, celui de la réinvention de soi et de la quête obstinée de liberté.');
        $penseauxpierres->setImage('pense_aux_pierres.jpg');
        $penseauxpierres->setAuteur($this->getReference(AuteursFixtures::WAUTERS));
        $penseauxpierres->setEditeur($this->getReference(EditeursFixtures::VERDIER));
        $penseauxpierres->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $penseauxpierres->setActive(true);
        $manager->persist($penseauxpierres);

        $Asta = new Livres();

        $Asta->setISBN('978-2-246-81593-8');
        $Asta->setTitre('Asta');
        $Asta->setNbPages(496);
        $Asta->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-08-29"));
        $Asta->setPrixHt(23);
        $Asta->setEstConseil(1);
        $Asta->setResume('Reykjavik, au début des années 50. Sigvaldi et Helga décident de nommer leur deuxième fille Ásta, d\'après une grande héroïne de la littérature islandaise. Un prénom signifiant - à une lettre près - amour en islandais qui ne peut que porter chance à leur fille... Des années plus tard, Sigvaldi tombe d\'une échelle et se remémore toute son existence : il n\'a pas été un père à la hauteur, et la vie d\'Ásta n\'a pas tenu cette promesse de bonheur. Jón Kalman Stefánsson enjambe les époques et les pays pour nous raconter l\'urgence autant que l\'impossibilité d\'aimer. À travers l\'histoire de Sigvaldi et d\'Helga puis, une génération plus tard, celle d\'Ásta et de Jósef, il nous offre un superbe roman, lyrique et charnel, sur des sentiments plus grands que nous, et des vies qui s\'enlisent malgré notre inlassable quête du bonheur.');
        $Asta->setImage('asta.jpg');
        $Asta->setAuteur($this->getReference(AuteursFixtures::STEFANSSON));
        $Asta->setEditeur($this->getReference(EditeursFixtures::GRASSET));
        $Asta->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $Asta->setActive(true);
        $manager->persist($Asta);

        $Patria = new Livres();

        $Patria->setISBN('978-2-330-09664-9');
        $Patria->setTitre('Patria');
        $Patria->setNbPages(616);
        $Patria->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-03-07"));
        $Patria->setPrixHt(25);
        $Patria->setEstConseil(1);
        $Patria->setResume('Véritable phénomène de société en Espagne (plus de 600.000 ex. vendus), «Patria» y a été qualifié de "«Guerre et Paix» du Pays basque" par une partie de la presse. Tandis qu\'il a excédé les séparatistes radicaux. À travers l\'histoire de deux familles très unies séparées par le "conflit", Fernando Aramburu explore sur près de quarante ans - des années de plomb du post franquisme jusqu\'en 2011, quand l\'ETA dépose les armes -, la douleur d\'une population prise en otage par l\'Histoire qui transforme potentiellement chacun en traître. Constitué d\'une centaine de courts chapitres qui ressemblent à des contes, le roman possède une chronologie plus émotive que temporelle mais le "chaos" est magistralement ordonné pour que la fiction littéraire puisse aider à comprendre la vérité d\'une époque.');
        $Patria->setImage('patria.jpg');
        $Patria->setAuteur($this->getReference(AuteursFixtures::ARAMBURU));
        $Patria->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $Patria->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $Patria->setActive(true);
        $manager->persist($Patria);

        $lavieparfaite = new Livres();

        $lavieparfaite->setISBN('979-1-034-90016-9');
        $lavieparfaite->setTitre('La vie parfaite');
        $lavieparfaite->setNbPages(400);
        $lavieparfaite->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-04-05"));
        $lavieparfaite->setPrixHt(22);
        $lavieparfaite->setEstConseil(0);
        $lavieparfaite->setResume('Adele monte dans le bus qui relie la cité des Lombriconi au centre de Bologne. Elle vient d’avoir 18 ans et part accoucher, seule. Parce que le père est un voyou égoïste, parce que là où elle vit tout le monde semble « né pour perdre », parce qu’elle veut donner à son enfant la chance d’une vie meilleure, Adele est sur le point de l’abandonner. Dans son grand appartement du centre-ville, Dora, elle, n’est pas seule. Mais après des années de FIV ratées, son désir de maternité s’est transformé en obsession et mine son mariage. Entre ces deux femmes au seuil de choix cruciaux, il y a Zeno : le voisin d’Adele qui tous les soirs l’espionne depuis son balcon ; l’élève appliqué de Dora, qui connaît les frontières invisibles qui séparent la ville et les êtres. Et tous au fond cherchent la même chose. Un refuge, un lieu tranquille d’où l’on pourrait apercevoir, au loin, la vie parfaite. Silvia Avallone sonde ce moment si particulier, mêlé de peur et d’émerveillement, où l’on choisit d’avoir un enfant, de croire en son avenir. Avec une énergie romanesque et une puissance d’écriture incomparables, un sens aigu du portrait et de la mise en scène, elle porte un regard d’une terrible acuité sur sa génération, une jeunesse écartelée entre précarité et utopie.');
        $lavieparfaite->setImage('lavieparfaite.jpg');
        $lavieparfaite->setAuteur($this->getReference(AuteursFixtures::AVALLONE));
        $lavieparfaite->setEditeur($this->getReference(EditeursFixtures::LIANALEVI));
        $lavieparfaite->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $lavieparfaite->setActive(true);
        $manager->persist($lavieparfaite);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            AuteursFixtures::class,
            EditeursFixtures::class,
            CategoriesFixtures::class,
        );
    }
}