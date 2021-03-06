<?php
// src/DataFixtures/LivresFixtures.php
namespace App\DataFixtures;

use App\Entity\Livres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LivresFixtures extends Fixture implements DependentFixtureInterface
{
    public const ASTA = 'asta';
    public const BASLAPLACE = 'baslaplace';

    public function load(ObjectManager $manager)
    {
        $miserables = new Livres();

        $miserables->setISBN('978-2-253-09633-7');
        $miserables->setTitre('Les Misérables');
        $miserables->setNbPages(992);
        $miserables->setDateParution(\DateTime::createFromFormat('Y-m-d', "1862-03-30"));
        $miserables->setPrixTtc(12.5);
        $miserables->setEstConseil(1);
        $miserables->setNoteMoyenne(0);
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
        $particule->setPrixTtc(8.10);
        $particule->setEstConseil(1);
        $particule->setNoteMoyenne(0);
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
        $extension->setPrixTtc(12);
        $extension->setEstConseil(1);
        $extension->setNoteMoyenne(0);
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
        $asonimage->setPrixTtc(19.50);
        $asonimage->setEstConseil(0);
        $asonimage->setNoteMoyenne(0);
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
        $sermon->setPrixTtc(7.7);
        $sermon->setEstConseil(1);
        $sermon->setNoteMoyenne(0);
        $sermon->setResume('Dans un village corse perché loin de la côte, le bar local est en train de connaître une mutation profonde sous l\'impulsion de ses nouveaux gérants. A la sur-prise générale, ces deux enfants du pays ont tourné le dos à de prometteuses études de philosophie sur le continent pour, fidèles aux enseignements de Leibniz, transformer un modeste débit de boissons en "meilleur des mondes possibles". Mais c\'est bientôt l\'enfer en personne qui s\'invite au comptoir, réactivant les blessures anciennes d\'êtres assujettis à d\'indigents rêves de bonheur et victimes, à leur insu, de la tragique propension de l\'âme humaine à se corrompre. Entrant par-delà les siècles en résonance avec le sermon par lequel saint Augustin tenta de consoler ses fidèles de la fragilité des royaumes terrestres, Jérôme Ferrari jette, au fil d\'une écriture somptueuse, une lumière impitoyable sur la malédiction qui condamne les mortels à voir s\'effondrer les mondes qu\'ils édifient et à refonder sans trêve, sur le sang ou les larmes, leurs impossibles mythologies.');
        $sermon->setImage('sermon_chute_rome.jpg');
        $sermon->setAuteur($this->getReference(AuteursFixtures::FERRARI));
        $sermon->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $sermon->setCategorie($this->getReference(CategoriesFixtures::ROMAN_FR));
        $sermon->setActive(true);
        $manager->persist($sermon);

        $passagers = new Livres();

        $passagers->setISBN('978-2-723-40132-4');
        $passagers->setTitre('Les Passagers du Vent - 1. La Fille sous la dunette');
        $passagers->setNbPages(48);
        $passagers->setDateParution(\DateTime::createFromFormat('Y-m-d', "1980-01-01"));
        $passagers->setPrixTtc(14.5);
        $passagers->setEstConseil(1);
        $passagers->setNoteMoyenne(0);
        $passagers->setResume('"La Fille sous la dunette" est le premier des cinq tomes des "Passagers du Vent", série créée par François Bourgeon. XVIIIe siècle, à bord d\'un navire. Hoël Tragan aperçoit deux jeunes femmes sous la dunette. Piqué par la curiosité, il s\'aventure dans la zone interdite à l\'équipage. Repéré, il est arrêté et mis aux fers. Il reçoit alors la visite d\'un "jeune homme" qui s\'avère être Isa, l\'une des filles qu\'il avait vues. Isa lui racontera comment, jeune enfant, elle avait changé d\'identité avec son amie par jeu, ce qui lui valut de perdre son titre de noblesse. Après diverses péripéties, notamment un combat contre des vaisseaux britanniques, Hoël est fait prisonnier par la Royal Navy...');
        $passagers->setImage('passagers_du_vent.jpg');
        $passagers->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers->setCategorie($this->getReference(CategoriesFixtures::BD));
        $passagers->setActive(true);
        $manager->persist($passagers);

        $passagers2 = new Livres();

        $passagers2->setISBN('978-2-723-40164-2');
        $passagers2->setTitre('Les Passagers du Vent - 2. Le ponton');
        $passagers2->setNbPages(46);
        $passagers2->setDateParution(\DateTime::createFromFormat('Y-m-d', "1980-10-01"));
        $passagers2->setPrixTtc(14.5);
        $passagers2->setEstConseil(1);
        $passagers2->setNoteMoyenne(0);
        $passagers2->setResume('Avec ce second volume, Bourgeon continue de tisser autour d\'Isabeau un récit sur la liberté, et en particulier la liberté des femmes. Isabeau est rejointe par un second personnage fort, en la personnage de Mary, jeune anglaise qui s\'oppose au dictat de son père (et n\'oublions pas la mendiante Grenouille). La quête de vengeance d\'Isabeau contre son père n\'est plus d\'actualité. La priorité est de faire évader Hoël, l\'amoureux un peu maladroit, et le médecin de marine Michel de Saint-Quentin. Tous deux sont retenus prisonniers de guerre par les troupes anglaises, dans un ponton (vaisseau désarmé et échoué sur le rivage).');
        $passagers2->setImage('passagers_du_vent_2.jpg');
        $passagers2->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers2->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers2->setCategorie($this->getReference(CategoriesFixtures::BD));
        $passagers2->setActive(true);
        $manager->persist($passagers2);

        $passagers3 = new Livres();

        $passagers3->setISBN('978-2-723-40215-0');
        $passagers3->setTitre('Les Passagers du Vent - 3. Le comptoir de Juda');
        $passagers3->setNbPages(46);
        $passagers3->setDateParution(\DateTime::createFromFormat('Y-m-d', "1981-05-01"));
        $passagers3->setPrixTtc(14.5);
        $passagers3->setEstConseil(1);
        $passagers3->setNoteMoyenne(0);
        $passagers3->setResume('A bord du négrier La Marie-Caroline, nous suivons une nouvelle fois les pérégrinations de nos quatre protagonistes Isa, Hoel, Mary et John. Mais ne vous y fiez pas, les aventures de ce troisième volet se passeront sur terre et non en mer. Cette terre, c\'est celle, brûlante et sauvage, de l\'Afrique. La Marie-Caroline fait escale au comptoir du Juda que l\'on situe dans l\'actuel Bénin pour faire « le plein » d\'esclaves. Nous sommes au coeur du commerce triangulaire. Logés par les « administrateurs » français du comptoir, nos « passagers du vent » vont connaître la chaleur qui altère la raison sans désaltérer la soif ; la cruauté apparentée à la justice ; la misogynie la plus méprisable (Isa sera l\'enjeu d\'un pari qui dégénèrera en drame) et la noirceur d\'âme des colons à la peau blanche. François Bourgeon, de son trait précis et acéré, sait rendre une fois encore palpable une ambiance oppressante et prégnante. Pour un peu, on sentirait nous aussi la brûlure du soleil immuablement zénithal et on perdrait peu à peu le sens des réalités…');
        $passagers3->setImage('passagers_du_vent_3.jpg');
        $passagers3->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers3->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers3->setCategorie($this->getReference(CategoriesFixtures::BD));
        $passagers3->setActive(true);
        $manager->persist($passagers3);

        $passagers4 = new Livres();

        $passagers4->setISBN('978-2-723-40290-8');
        $passagers4->setTitre('Les Passagers du Vent - 4. L\'heure du serpent');
        $passagers4->setNbPages(46);
        $passagers4->setDateParution(\DateTime::createFromFormat('Y-m-d', "1982-04-01"));
        $passagers4->setPrixTtc(14.5);
        $passagers4->setEstConseil(1);
        $passagers4->setNoteMoyenne(0);
        $passagers4->setResume('"L\'heure du serpent" semble avoir moins bonne réputation que ces prédécesseurs auprès des thuriféraires des "Passagers du vent", alors qu\'il me paraît quant à moi légèrement supérieur au "Comptoir de Juda" avec lequel il constitue une sorte diptyque : c\'est dans ce quatrième tome que se concluent en effet toutes les intrigues ouvertes dans le précédent, certaines de manière un peu "légère" il est vrai (la guérison de Hoel, qui était au départ l\'enjeu majeur du livre, survient sans guère d\'explications...). Il y a dans ce livre gorgé jusqu\'à la saturation de péripéties toutes plus violentes les unes que les autres, deux vrais temps forts : d\'abord la visite au roi, chargée de menaces et lourde de conséquence, et ensuite la réapparition d\'un Smolett fou à lier qui s’achèvera de manière dramatique dans les marais. On peut d\'ailleurs considérer que ces scènes de poursuite et de folie nocturne sont ce que "les Passagers du Vent" nous ont offert de mieux jusqu\'à présent.');
        $passagers4->setImage('passagers_du_vent_4.jpg');
        $passagers4->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers4->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers4->setCategorie($this->getReference(CategoriesFixtures::BD));
        $passagers4->setActive(true);
        $manager->persist($passagers4);

        $meilleurmonde = new Livres();

        $meilleurmonde->setISBN('978-2-266-28303-8');
        $meilleurmonde->setTitre('Le meilleur des mondes');
        $meilleurmonde->setNbPages(320);
        $meilleurmonde->setDateParution(\DateTime::createFromFormat('Y-m-d', "1932-01-01"));
        $meilleurmonde->setPrixTtc(4.95);
        $meilleurmonde->setEstConseil(1);
        $meilleurmonde->setNoteMoyenne(0);
        $meilleurmonde->setResume('Demain, le bonheur sera universel. Et obligatoire ! Dans le meilleur des mondes les foetus sont « préparés» dans des incubatrices en fonction du rôle qu\'on leur destine. Les futurs Alphas, de la caste des élites, reçoivent plus d\'oxygène, plus de «pseudo sang». Quant aux futurs Epsilons, à qui l\'on réserve les tâches les plus pénibles, on veille à ne pas développer leurs facultés intellectuelles : un bon ouvrier n\'a pas besoin de penser. Dans le meilleur des mondes, un système éducatif qui façonne les esprits comme les corps, une société communautaire qui proscrit l\'individualisme, où la cellule familiale ne peut exister. Dans ce meilleur des mondes méthodiquement planifié pour construire les hommes en fonction des besoins, pour contraindre un bonheur artificiel, pour museler les passions et les interrogations, il y aura bien un grain de sable pour s\'insérer dans les rouages. Un récit incontournable écrit en 1931, qui n\'a pas fini d\'influencer écrivains et cinéastes. ');
        $meilleurmonde->setImage('meilleur_des_mondes.jpg');
        $meilleurmonde->setAuteur($this->getReference(AuteursFixtures::HUXLEY));
        $meilleurmonde->setEditeur($this->getReference(EditeursFixtures::POCKET));
        $meilleurmonde->setCategorie($this->getReference(CategoriesFixtures::ANTICIPATION));
        $meilleurmonde->setActive(true);
        $manager->persist($meilleurmonde);

        $mille984 = new Livres();

        $mille984->setISBN('978-2-070-36822-8');
        $mille984->setTitre('1984');
        $mille984->setNbPages(438);
        $mille984->setDateParution(\DateTime::createFromFormat('Y-m-d', "1949-01-01"));
        $mille984->setPrixTtc(8.9);
        $mille984->setEstConseil(1);
        $mille984->setNoteMoyenne(0);
        $mille984->setResume('Souriez, vous êtes filmés. Londres, 1984. Voici Winston Smith, employé au Ministère de la Vérité, chargé de réécrire l\'histoire afin qu\'elle s\'accorde avec la version officielle. Voici les télécrans qui diffusent en permanence les messages de propagande et espionnent sans relâche chaque individu. Voici Julia, rencontrée lors des Deux Minutes de la Haine quotidiennes et obligatoires où l\'on conspue le Traître Emmanuel Goldstein, qui aura maille à partir, comme Winston, avec la Police de la Pensée. Voici la novlangue qui dépouille le langage de ses inflexions subversives, qui le réduit à un rôle informatif. Et surtout, voici Big Brother, aujourd\'hui passé au stade de figure mythique, symbole de la surveillance et de l\'oppression totalitaire. 1984, une machine monstrueuse si habilement huilée, qui broie l\'homme et les pensées, et que plus rien ne semble pouvoir enrayer. Nous n\'en avons pas rêvé, Orwell l\'a fait. Espérons qu\'il sera le seul.');
        $mille984->setImage('1984.jpg');
        $mille984->setAuteur($this->getReference(AuteursFixtures::ORWELL));
        $mille984->setEditeur($this->getReference(EditeursFixtures::GALLIMARD));
        $mille984->setCategorie($this->getReference(CategoriesFixtures::ANTICIPATION));
        $mille984->setActive(true);
        $manager->persist($mille984);

        $ferme = new Livres();

        $ferme->setISBN('978-2-070-37516-5');
        $ferme->setTitre('La Ferme des Animaux');
        $ferme->setNbPages(150);
        $ferme->setDateParution(\DateTime::createFromFormat('Y-m-d', "1945-01-01"));
        $ferme->setPrixTtc(6.6);
        $ferme->setEstConseil(1);
        $ferme->setNoteMoyenne(0);
        $ferme->setResume('Un certain 21 juin eut lieu en Angleterre la révolte des animaux. Les cochons dirigent le nouveau régime. Snowball et Napoléon, cochons en chef, affichent un règlement : " Tout ce qui est sur deux jambes est un ennemi. Tout ce qui est sur quatre jambes ou possède des ailes est un ami. Aucun animal ne portera de vêtements. Aucun animal ne dormira dans un lit. Aucun animal ne boira d\'alcool. Aucun animal ne tuera un autre animal. Tous les animaux son égaux. "Le temps passe. La pluie efface les commandements. L\'âne, un cynique, arrive encore à déchiffrer : " Tous les animaux sont égaux, mais (il semble que cela ait été rajouté) il y en a qui le sont plus que d\'autres. "');
        $ferme->setImage('lafermedesanimaux.jpg');
        $ferme->setAuteur($this->getReference(AuteursFixtures::ORWELL));
        $ferme->setEditeur($this->getReference(EditeursFixtures::GALLIMARD));
        $ferme->setCategorie($this->getReference(CategoriesFixtures::ANTICIPATION));
        $ferme->setActive(true);
        $manager->persist($ferme);

        $un_bonheur_insoutenable = new Livres();

        $un_bonheur_insoutenable->setISBN('978-2-290-33285-6');
        $un_bonheur_insoutenable->setTitre('Un Bonheur Insoutenable');
        $un_bonheur_insoutenable->setNbPages(372);
        $un_bonheur_insoutenable->setDateParution(\DateTime::createFromFormat('Y-m-d', "1970-01-01"));
        $un_bonheur_insoutenable->setPrixTtc(10.2);
        $un_bonheur_insoutenable->setEstConseil(1);
        $un_bonheur_insoutenable->setNoteMoyenne(0);
        $un_bonheur_insoutenable->setResume('Un bonheur insoutenable (titre original This Perfect Day) est un roman d\'anticipation contre-utopique américain d\'Ira Levin, publié en 1970. Il est considéré comme un des grands romans dystopiques de la science-fiction du XXe siècle, avec 1984 et Le Meilleur des mondes. L\'action se situe dans l\'avenir, après l\'année 2000. L\'humanité (désignée sous le nom de Famille) est unifiée, et il n\'y a plus qu\'une seule langue parlée. Son destin dépend d\'un ordinateur caché sous les Alpes : UniOrd ou Uni. Uni contrôle tout : il éduque, oriente, autorise ou non les mariages et la procréation. Violence et égoïsme ont disparu de la surface de la Terre. Hommes et femmes reçoivent un traitement médicamenteux mensuel — dans les médicentres — chargé de les rendre dociles et maîtriser leur reproduction. Les prénoms ont été remplacés par des identifiants alphanumériques, chacun devant s\'identifier en permanence devant des scanners. Seul le bonheur des membres de la Famille compte et Uni y pourvoit. Dans ce monde idéal, où la pluie ne semble pas exister, toute volonté humaine semble avoir disparu. Cependant certains membres de la Famille sont des révoltés : ils refusent de voir leur existence contrôlée par une machine. Copeau, héros du roman, vient à haïr ce monde où le bonheur est imposé. Avec Lilas, il souhaite rejoindre les « incurables » qui se sont réfugiés sur des îles ne figurant pas sur les cartes de ce monde. Il décide d\'organiser une expédition pour faire exploser UniOrd (l\'ordinateur central). Cette expédition va-t-elle réussir ?');
        $un_bonheur_insoutenable->setImage('un_bonheur_insoutenable.jpg');
        $un_bonheur_insoutenable->setAuteur($this->getReference(AuteursFixtures::LEVIN));
        $un_bonheur_insoutenable->setEditeur($this->getReference(EditeursFixtures::JAILU));
        $un_bonheur_insoutenable->setCategorie($this->getReference(CategoriesFixtures::ANTICIPATION));
        $un_bonheur_insoutenable->setActive(true);
        $manager->persist($un_bonheur_insoutenable);

        $penseauxpierres = new Livres();

        $penseauxpierres->setISBN('978-2-864-32987-9');
        $penseauxpierres->setTitre('Pense aux pierres sous tes pas');
        $penseauxpierres->setNbPages(192);
        $penseauxpierres->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-08-23"));
        $penseauxpierres->setPrixTtc(15);
        $penseauxpierres->setEstConseil(1);
        $penseauxpierres->setNoteMoyenne(0);
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
        $Asta->setPrixTtc(23);
        $Asta->setEstConseil(1);
        $Asta->setNoteMoyenne(4.5);
        $Asta->setResume('Reykjavik, au début des années 50. Sigvaldi et Helga décident de nommer leur deuxième fille Ásta, d\'après une grande héroïne de la littérature islandaise. Un prénom signifiant - à une lettre près - amour en islandais qui ne peut que porter chance à leur fille... Des années plus tard, Sigvaldi tombe d\'une échelle et se remémore toute son existence : il n\'a pas été un père à la hauteur, et la vie d\'Ásta n\'a pas tenu cette promesse de bonheur. Jón Kalman Stefánsson enjambe les époques et les pays pour nous raconter l\'urgence autant que l\'impossibilité d\'aimer. À travers l\'histoire de Sigvaldi et d\'Helga puis, une génération plus tard, celle d\'Ásta et de Jósef, il nous offre un superbe roman, lyrique et charnel, sur des sentiments plus grands que nous, et des vies qui s\'enlisent malgré notre inlassable quête du bonheur.');
        $Asta->setImage('asta.jpg');
        $Asta->setAuteur($this->getReference(AuteursFixtures::STEFANSSON));
        $Asta->setEditeur($this->getReference(EditeursFixtures::GRASSET));
        $Asta->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $Asta->setActive(true);
        $manager->persist($Asta);
        $this->addReference(self::ASTA, $Asta);

        $Patria = new Livres();

        $Patria->setISBN('978-2-330-09664-9');
        $Patria->setTitre('Patria');
        $Patria->setNbPages(616);
        $Patria->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-03-07"));
        $Patria->setPrixTtc(25);
        $Patria->setEstConseil(1);
        $Patria->setNoteMoyenne(0);
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
        $lavieparfaite->setPrixTtc(22);
        $lavieparfaite->setEstConseil(0);
        $lavieparfaite->setNoteMoyenne(0);
        $lavieparfaite->setResume('Adele monte dans le bus qui relie la cité des Lombriconi au centre de Bologne. Elle vient d’avoir 18 ans et part accoucher, seule. Parce que le père est un voyou égoïste, parce que là où elle vit tout le monde semble « né pour perdre », parce qu’elle veut donner à son enfant la chance d’une vie meilleure, Adele est sur le point de l’abandonner. Dans son grand appartement du centre-ville, Dora, elle, n’est pas seule. Mais après des années de FIV ratées, son désir de maternité s’est transformé en obsession et mine son mariage. Entre ces deux femmes au seuil de choix cruciaux, il y a Zeno : le voisin d’Adele qui tous les soirs l’espionne depuis son balcon ; l’élève appliqué de Dora, qui connaît les frontières invisibles qui séparent la ville et les êtres. Et tous au fond cherchent la même chose. Un refuge, un lieu tranquille d’où l’on pourrait apercevoir, au loin, la vie parfaite. Silvia Avallone sonde ce moment si particulier, mêlé de peur et d’émerveillement, où l’on choisit d’avoir un enfant, de croire en son avenir. Avec une énergie romanesque et une puissance d’écriture incomparables, un sens aigu du portrait et de la mise en scène, elle porte un regard d’une terrible acuité sur sa génération, une jeunesse écartelée entre précarité et utopie.');
        $lavieparfaite->setImage('lavieparfaite.jpg');
        $lavieparfaite->setAuteur($this->getReference(AuteursFixtures::AVALLONE));
        $lavieparfaite->setEditeur($this->getReference(EditeursFixtures::LIANALEVI));
        $lavieparfaite->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $lavieparfaite->setActive(true);
        $manager->persist($lavieparfaite);

        $baslaplace = new Livres();

        $baslaplace->setISBN('978-2-864-32992-3');
        $baslaplace->setTitre('Bas la place y\'a personne');
        $baslaplace->setNbPages(896);
        $baslaplace->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-09-20"));
        $baslaplace->setPrixTtc(35);
        $baslaplace->setEstConseil(1);
        $baslaplace->setNoteMoyenne(3);
        $baslaplace->setResume('Bas la place y\'a personne n\'est pas un récit d\'enfance comme les autres. Il s\'ouvre sur cette phrase : « Je suis née sous une petite table ». Dès lors le lecteur, saisi par la puissance et la singularité de cette prose légère et envoûtante, s\'attache à cette petite fille abandonnée qui a trouvé là un refuge et une façon qui n\'appartient qu\'à elle d\'appréhender le monde. Le lieu où l\'on eut les premières alertes de la vie devient nous-mêmes, écrit Dolores Prato.

Pour éviter les pièges de la mémoire, l\'auteure décrit avec une précision scrupuleuse et une opiniâtreté généreuse la ville (il s\'agit de Treja, dans les Marches), les objets ou les personnages qui ont habité son enfance.

Non seulement elle nous offre par-là de véritables tableaux d\'un monde disparu (l\'Italie rurale à la charnière du XIXe et du XXe siècle) qui n\'ont rien à envier aux écrits des anthropologues, mais elle donne ainsi à la narration toute son incandescence et sa vérité sensible. Le temps perdu de Dolores Prato est tout à la fois intime et public, et s\'il est retrouvé, c\'est parce que le parti pris des choses est aussi celui des mots.

Dolores Prato a achevé son récit dans les années soixante-dix mais elle n\'en a jamais connu l\'édition intégrale. Tel fut le sort de ce texte que l\'on peut aujourd\'hui considérer comme un des classiques du XXe siècle et, à tout le moins, comme un des chefs-d\'oeuvre de la littérature italienne de l\'après-guerre.');
        $baslaplace->setImage('baslaplace.jpg');
        $baslaplace->setAuteur($this->getReference(AuteursFixtures::PRATO));
        $baslaplace->setEditeur($this->getReference(EditeursFixtures::VERDIER));
        $baslaplace->setCategorie($this->getReference(CategoriesFixtures::ROMAN_ETR));
        $baslaplace->setActive(true);
        $manager->persist($baslaplace);
        $this->addReference(self::BASLAPLACE, $baslaplace);

        $leverloiseau = new Livres();

        $leverloiseau->setISBN('978-2-075-10814-0');
        $leverloiseau->setTitre('Le Ver et l\'Oiseau');
        $leverloiseau->setNbPages(26);
        $leverloiseau->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-10-11"));
        $leverloiseau->setPrixTtc(15);
        $leverloiseau->setEstConseil(1);
        $leverloiseau->setNoteMoyenne(0);
        $leverloiseau->setResume('Sous la terre où grouille la vie, le ver rêve d\'espace et de tranquillité. Au-dessus de lui, l\'oiseau attend, bravant la pluie et le vent. Lui aussi rêve de calme et d\'immensité. Le ver sort enfin. Il croise l\'oiseau. Vont-ils trouver ce qu\'ils ont tant cherché ? Une merveille d\'album, invitation à savourer chaque moment, par la créatrice du «Renard et l\'étoile».');
        $leverloiseau->setImage('leveretloiseau.jpg');
        $leverloiseau->setAuteur($this->getReference(AuteursFixtures::BICKFORD));
        $leverloiseau->setEditeur($this->getReference(EditeursFixtures::GALLIMARD));
        $leverloiseau->setCategorie($this->getReference(CategoriesFixtures::JEUNESSE));
        $leverloiseau->setActive(true);
        $manager->persist($leverloiseau);

        $grandmeaulnes = new Livres();

        $grandmeaulnes->setISBN('978-2-070-58320-1');
        $grandmeaulnes->setTitre('Le Grand Meaulnes');
        $grandmeaulnes->setNbPages(336);
        $grandmeaulnes->setDateParution(\DateTime::createFromFormat('Y-m-d', "1913-01-01"));
        $grandmeaulnes->setPrixTtc(4.6);
        $grandmeaulnes->setEstConseil(1);
        $grandmeaulnes->setNoteMoyenne(0);
        $grandmeaulnes->setResume('Nouvel élève à Sainte-Agathe, Augustin Meaulnes fascine François dont il devient le meilleur ami. Un jour d\'hiver, il disparaît. À son retour, il n\'est plus le même. Où est-il allé ? Qu\'a-t-il vécu de si extraordinaire? Seul François est dans la confidence. Ce secret partagé va changer pour toujours le destin des deux garçons...
Entre réalisme et merveilleux, une bouleversante histoire d\'amour et d\'amité. L\'unique roman d\'un jeune écrivain mort à la guerre de 1914. ');
        $grandmeaulnes->setImage('grandmeaulnes.jpg');
        $grandmeaulnes->setAuteur($this->getReference(AuteursFixtures::FOURNIER));
        $grandmeaulnes->setEditeur($this->getReference(EditeursFixtures::GALLIMARD));
        $grandmeaulnes->setCategorie($this->getReference(CategoriesFixtures::JEUNESSE));
        $grandmeaulnes->setActive(true);
        $manager->persist($grandmeaulnes);

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