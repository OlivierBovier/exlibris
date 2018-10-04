<?php
// src/DataFixtures/AuteursFixtures.php
namespace App\DataFixtures;

use App\Entity\Auteurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuteursFixtures extends Fixture
{

    public const HUGO = 'hugo';
    public const HOUELLEBECQ = 'houellebecq';
    public const FERRARI = 'ferrari';
    public const BOURGEON = 'bourgeon';
    public const HUXLEY = 'huxley';
    public const ORWELL = 'orwell';
    public const LEVIN = 'levin';
    public const WAUTERS = 'wauters';
    public const STEFANSSON = 'stefansson';
    public const ARAMBURU = 'aramburu';
    public const AVALLONE = 'avallone';
    public const PRATO = 'prato';

    public function load(ObjectManager $manager)
    {
        
        $hugo = new Auteurs();
        $hugo->setPrenomAuteur('Victor');
        $hugo->setNomAuteur('Hugo');
        $hugo->setBiographieAuteur(' Victor Hugo est né le 26 Février 1802 à Besancon en France. Poète, romancier et dramaturge, Victor Hugo est sans conteste l\'un des géants de la littérature française. Les romans les plus connus de Victor Hugo sont "Notre-Dame de Paris" (1831) et"Les Miserables" (1862). L\'auteur des Misérables, des Châtiments et de nombreux poèmes a allié à la fois ambition, longévité, puissance de travail et génie, ce qui ne pouvait que concourir à ce mélange de fascination et d\'irritation qu\'il suscite encore aujourd\'hui. Il écrivait avec simplicité et puissance les bonheurs et malheurs de la vie. Victor Hugo était un travailleur acharné. Entre 1827 ( Préface de son drame Cromwell) et 1830 (représentation d\'Hernani, qui est l\'occasion d\'une célèbre «bataille»), Victor Hugo s\'affirme comme le chef du romantisme. De 1830 à 1840, il publie: un grand roman historique, Notre-Dame de Paris (1831) ; des drames, Marion de Lorme (1831), Le roi s\'amuse (1832), Marie Tudor (1833), Lucrèce Borgia (1833), Ruy Blas (1838); et surtout quatre recueils de poésies, où il se montre maître dans l\'expression lyrique des idées et des sentiments: les Feuilles d\'automne (1831), les Chants du crépuscule (1835), les Voix intérieures (1837), les Rayons et les Ombres (1840). Victor Hugo est mort à Paris le 23 Mai 1885 à 83 ans. Plus de 3 millions de personnes ont assisté à ses funérailles.');
        $hugo->setImage('hugo.jpg');

        $manager->persist($hugo);
        $this->addReference(self::HUGO, $hugo);

        $houellebecq = new Auteurs();
        $houellebecq->setPrenomAuteur('Michel');
        $houellebecq->setNomAuteur('Houellebecq');
        $houellebecq->setBiographieAuteur('Michel Houellebecq (prononcer [wɛlˈbɛk]), né Michel Thomas le 26 février 1956 (ou 1958) à Saint-Pierre (La Réunion), est un écrivain, poète et essayiste français. Il est révélé par les romans Extension du domaine de la lutte et, surtout, Les Particules élémentaires, qui le fait connaître d\'un large public. Ce dernier roman, et son livre suivant Plateforme, sont considérés comme précurseurs dans la littérature française, notamment pour leur description de la misère affective et sexuelle de l\'homme occidental dans les années 1990 et 2000. Avec La Carte et le Territoire, Michel Houellebecq reçoit le prix Goncourt en 2010, après avoir été plusieurs fois pressenti pour ce prix. En parallèle de ses activités littéraires, il est également lecteur de ses propres textes, réalisateur et acteur, s\'illustrant notamment en 2014 dans deux films : L\'Enlèvement de Michel Houellebecq et Near Death Experience. ');
        $houellebecq->setImage('houellebecq.jpg');

        $manager->persist($houellebecq);
        $this->addReference(self::HOUELLEBECQ, $houellebecq);

        $ferrari = new Auteurs();
        $ferrari->setPrenomAuteur('Jérôme');
        $ferrari->setNomAuteur('Ferrari');
        $ferrari->setBiographieAuteur('Jérôme Ferrari, né en 1968 à Paris, est un écrivain et traducteur français. Il effectue une partie de ses études à la Sorbonne, où il obtint la licence de philosophie de l\'université Paris 1 Panthéon-Sorbonne. Ses parents sont originaires de Fozzano et de Sartène, et il a lui-même vécu en Corse et enseigné la philosophie au lycée de Porto-Vecchio. Durant cette période, il a organisé notamment des « cafés philosophies » à Bastia, puis enseigné au lycée international Alexandre-Dumas d\'Alger, au lycée Fesch Ajaccio jusqu\'en 2012, et au lycée français Louis Massignon d\'Abou Dabi1 jusqu\'en 2015. Depuis la rentrée 2015, il enseigne la philosophie en hypokhâgne, au lycée Giocante de Casabianca de Bastia. Il obtient le prix Goncourt 2012 pour son livre Le Sermon sur la chute de Rome. ');
        $ferrari->setImage('ferrari.jpg');

        $manager->persist($ferrari);
        $this->addReference(self::FERRARI, $ferrari);

        $bourgeon = new Auteurs();
        $bourgeon->setPrenomAuteur('François');
        $bourgeon->setNomAuteur('Bourgeon');
        $bourgeon->setBiographieAuteur('François Bourgeon est né à Paris en 1945. Il poursuit des études classiques, perfectionne son dessin dans divers ateliers, puis passe le concours d\'entrée à l\'école des Métiers d\'Art d\'où il sort après trois ans d\'études avec un diplôme de maître verrier. Sa première histoire en BD paraît en 1972 : L\'ennemi vient de la mer dans Lisette (à la fermeture du journal, il passe chez Fleurus). Brunelle et Colin sont publiés dans Djin. Parallèlement, il collabore à Pif pour mettre en images La vouivre de Bernard Clavel ou des extraits de Jules Verne, etc... En 1978, les éditions Glénat proposent à François Bourgeon d\'éditer Brunelle et Colin en album et lui offrent la possibilité de commencer une série dans la revue Circus. Ainsi démarrent "Les Passagers du Vent". Le premier album, La fille sur la dunette lui valut un Alfred à Angoulême en 1979, puis suivirent Le ponton, Le comptoir de Juda, L\'heure du serpent et Le bois d\'ébène. Il entreprend une autre série aux éditions Casterman sous le titre "Les Compagnons du Crépuscule" en trois volumes : Le sortilège du bois des brumes, Les yeux d\'étain de la ville glauque et Le dernier chant des Malaterre. En octobre 1993, né d\'une collaboration avec Claude Lacroix, paraît aux éditions Casterman le premier des deux ouvrages consacrés au "Cycle de Cyann" : La source et la sonde. Le second tome, Six saisons sur Ilo paraîtra en octobre 1997.');
        $bourgeon->setImage('bourgeon.jpg');

        $manager->persist($bourgeon);
        $this->addReference(self::BOURGEON, $bourgeon);

        $huxley = new Auteurs();
        $huxley->setPrenomAuteur('Aldous');
        $huxley->setNomAuteur('Huxley');
        $huxley->setBiographieAuteur('Aldous Leonard Huxley, né le 26 juillet 1894 à Godalming (Royaume-Uni) et mort le 22 novembre 1963 à Los Angeles (États-Unis), est un écrivain, romancier et philosophe britannique, membre éminent de la famille Huxley. Il est diplômé du Balliol College de l\'Université d\'Oxford avec une mention très bien en littérature anglaise. Auteur de près de cinquante ouvrages , il est surtout connu pour ses romans, dont Le Meilleur des mondes roman d’anticipation dystopique ; pour des ouvrages non romanesques, comme Les Portes de la perception qui retrace les expériences vécues lors de la prise de drogue psychédélique ; et pour un large éventail d\'essais. Au début de sa carrière, Huxley a dirigé le magazine Oxford Poetry et publié des nouvelles et des poésies. Au milieu de sa carrière et plus tard, il a publié des récits de voyage et des scénarios cinématographiques. Il a passé la dernière partie de sa vie aux États-Unis, vivant à Los Angeles de 1937 jusqu\'à sa mort. En 1962, un an avant sa mort, il est élu Compagnon de littérature par la Royal Society of Literature. Huxley était humaniste, pacifiste et satiriste. Il s\'est également intéressé à des sujets spirituels tels que la parapsychologie et le mysticisme philosophique, en particulier l\'universalisme. Vers la fin de sa vie, Huxley fut largement reconnu comme l\'un des intellectuels prééminents de son temps. Il a été nominé sept fois pour le Prix Nobel de littérature');
        $huxley->setImage('huxley.jpg');

        $manager->persist($huxley);
        $this->addReference(self::HUXLEY, $huxley);

        $orwell = new Auteurs();
        $orwell->setPrenomAuteur('Georges');
        $orwell->setNomAuteur('Orwell');
        $orwell->setBiographieAuteur('George Orwell, nom de plume d’Eric Arthur Blair, né le 25 juin 1903 à Motihari (Inde) pendant la période du Raj britannique et mort le 21 janvier 1950 à Londres, est un écrivain, essayiste et journaliste britannique. Son œuvre porte la marque de ses engagements, qui trouvent eux-mêmes pour une large part leur source dans l\'expérience personnelle de l\'auteur : contre l\'impérialisme britannique, après son engagement de jeunesse comme représentant des forces de l\'ordre colonial en Birmanie ; pour la justice sociale et le socialisme démocratique, après avoir observé et partagé les conditions d\'existence des classes laborieuses à Londres et à Paris ; contre les totalitarismes nazi et soviétique, après sa participation à la guerre d\'Espagne. Parfois qualifié d\'« anarchiste conservateur », il est souvent comparé à la philosophe Simone Weil, en raison de ses prises de positions originales pour un socialiste. Témoin de son époque, Orwell est dans les années 1930 et 1940 chroniqueur, critique littéraire et romancier. De cette production variée, les deux œuvres au succès le plus durable sont deux textes publiés après la Seconde Guerre mondiale : La Ferme des animaux et surtout 1984, roman dans lequel il crée le concept de Big Brother, depuis passé dans le langage courant de la critique des techniques modernes de surveillance et de contrôle des individus. L\'adjectif « orwellien » est également fréquemment utilisé en référence à l\'univers totalitaire imaginé par cet écrivain anglais. ');
        $orwell->setImage('orwell.jpg');

        $manager->persist($orwell);
        $this->addReference(self::ORWELL, $orwell);

        $levin = new Auteurs();
        $levin->setPrenomAuteur('Ira');
        $levin->setNomAuteur('Levin');
        $levin->setBiographieAuteur('Ira Levin, né le 27 août 1929 à New York et mort le 12 novembre 2007 (à 78 ans) dans la même ville, est un écrivain américain, auteur de pièces de théâtre et de romans touchant les genres du fantastique, de la science-fiction, du policier et du thriller. Il étudie à l\'université Drake à Des Moines dans l\'Iowa, puis s\'inscrit à l\'université de New York et obtient son diplôme en littérature anglaise et philosophie en 1950. Il entreprend une carrière de scénariste à la télévision, mais le succès rencontré par La Couronne de cuivre, un roman policier inspiré d\'Une tragédie américaine de Dreiser, est suivi de la publication de plusieurs best-sellers touchant divers genres romanesques qui sont écrits en prévision d\'adaptations cinématographiques, les droits étant achetés avant même la publication des textes, exception faite du roman d\'anticipation Un bonheur insoutenable. Mais sa production romanesque possède de réelles qualités : Un bébé pour Rosemary, par exemple, devient un classique du roman fantastique avant même la célèbre adaptation qu\'en fait Roman Polanski avec Mia Farrow et John Cassavetes. Ira Levin est aussi un dramaturge estimé. Ses pièces, jouées à Londres et New York, sont ensuite montées partout dans le monde. Piège mortel (Deathtrap), pièce jouée sans interruption entre 1978 et 1982, détient encore le record de longévité sur Broadway pour une comédie policière avec près de 1800 représentations.');
        $levin->setImage('levin.jpg');

        $manager->persist($levin);
        $this->addReference(self::LEVIN, $levin);

        $wauters = new Auteurs();
        $wauters->setPrenomAuteur('Antoine');
        $wauters->setNomAuteur('Wauters');
        $wauters->setBiographieAuteur('Antoine Wauters a étudié la philosophie à l\'Université Libre de Bruxelles, où les cours de Jacques Sojcher vont particulièrement le marquer. C\'est grâce à lui qu\'il découvre Nietzsche, qu\'on retrouve dans son roman Nos mères. Ses études terminées, il gagne sa vie en effectuant des remplacements dans l\'enseignement, devenant tour à tour professeur de français et de religion dans le secondaire, puis de philosophie, à la Haute École Charlemagne. Il publie ses premiers livres en 2008, trois recueils de poésie. L\'un d\'eux, Debout sur la langue, reçoit le Prix Emile Polak de l\'Académie royale de langue et de littérature françaises de Belgique. En 2012, son récit poétique Césarine de nuit, chez Cheyne Éditeur, reçoit le Prix Marcel Thiry et le Prix de littérature française de la ville de Tournai, avant d\'être lu dans divers festivals par la comédienne Isabelle Nanty1,2. Dans le cadre de l\'exposition consacrée aux photographies de l\'artiste américain Cy Twombly organisée par Bozar3, il publie parallèlement Poésie pour Cy Twombly. Devenu éditeur chez Cheyne et directeur de la collection IF à l\'Arbre à paroles, il publie son premier roman chez Verdier en 2014. Rapidement remarqué, Nos mères reçoit le Prix Première de la RTBF, le Prix Révélation de la SGDL et est finaliste du Prix des cinq continents de la Francophonie, faisant d\'Antoine Wauters "la révélation littéraire belge de ces dernières années", selon les magazines Mariane et Focus Vif4. En 2015, le film Préjudice, long métrage d\'Antoine Cuypers qu\'Antoine Wauters a coscénarisé, sort en salles. Il réunit Nathalie Baye, Arno, Thomas Blanchard, Ariane Labed et Éric Caravaca. En novembre 2017, il participe à la première Nuit des Écrivains, organisée par Myriam Leroy et Pascal Claude, journalistes à la Première, aux côtés des écrivains Geneviève Damas, Laurent Gaudé, Joy Sorman et Abdallah Taia. Depuis mars 2018, il intervient ponctuellement comme professeur dans le cadre de L\'atelier des écritures contemporaines, Master de création littéraire de La Cambre.');
        $wauters->setImage('wauters.jpg');

        $manager->persist($wauters);
        $this->addReference(self::WAUTERS, $wauters);

        $stefansson = new Auteurs();
        $stefansson->setPrenomAuteur('Jón');
        $stefansson->setNomAuteur('Kalman Stefánsson');
        $stefansson->setBiographieAuteur('Jón Kalman Stefánsson (né le 17 décembre 1963 à Reykjavik) est un auteur islandais. Il grandit à Reykjavík et à Keflavík. Après avoir fini ses études au collège en 1982, il travailla en Islande de l\'ouest (par exemple dans les secteurs de la pêche et de la maçonnerie). Il entreprit ensuite des études en littérature à l\'université d\'Islande de 1986 à 1991, mais sans les terminer. Pendant cette période, il donna des cours dans différentes écoles et rédigea des articles pour le journal Morgunblaðið. Ensuite (de 1992 à 1995), il vécut à Copenhague, où il participa à divers travaux et s\'adonna à une lecture assidue. Il rentra en Islande et s\'occupa de la Bibliothèque municipale de Mosfellsbær jusqu\'en 2000. Son premier roman paraît en 1997 en Islande, mais c’est avec la trilogie romanesque composée de Entre ciel et terre, La Tristesse des anges et Le Cœur de l’homme, qu’il s’impose dans le monde entier comme un écrivain de premier plan. Il a reçu de nombreuses distinctions dans l’ensemble des pays où son œuvre est traduite. En 2015 notamment, il est récompensé par le prestigieux prix Millepages pour D’ailleurs, les poissons n’ont pas de pieds aux Editions Gallimard. ');
        $stefansson->setImage('stefansson.jpg');

        $manager->persist($stefansson);
        $this->addReference(self::STEFANSSON, $stefansson);

        $aramburu = new Auteurs();
        $aramburu->setPrenomAuteur('Fernando');
        $aramburu->setNomAuteur('Aramburu');
        $aramburu->setBiographieAuteur('Fernando Aramburu Irigoyen, né en 1959 à Saint-Sébastien (province du Guipuscoa, Espagne), est un écrivain espagnol. Il remporte le prix national de littérature narrative en 2017. Il obtient une licence en philologie hispanique à l\'université de Saragosse en 1982. À Saint-Sébastien, sa ville natale, il participe à la fondation du Grupo CLOC de Arte y Desarte, qui édite entre 1978 et 1981 une revue. Depuis 1985, il vit en Allemagne où il donne des cours d\'espagnol. En 2009, il abandonne son poste de professeur pour se consacrer entièrement à la création littéraire. En 1996, il publie Fuegos con limón, roman basé sur ses expériences de jeunesse au sein du groupe CLOC. En septembre 2016, il publie le roman Patria qui remporte un grand succès critique et public (plus de 500 000 exemplaires vendus2). Ce roman, qui traite de l\'influence des terroristes de l\'ETA dans une petite localité du Pays basque, obtient de nombreux prix dont le Prix national de littérature narrative en octobre 2017. Il écrit régulièrement dans la presse espagnole et ses romans ont été traduits dans plusieurs langues. ');
        $aramburu->setImage('aramburu.jpg');

        $manager->persist($aramburu);
        $this->addReference(self::ARAMBURU, $aramburu);

        $avallone = new Auteurs();
        $avallone->setPrenomAuteur('Silvia');
        $avallone->setNomAuteur('Avallone');
        $avallone->setBiographieAuteur('Silvia Avallone est une écrivaine et poétesse italienne contemporaine. Elle est née le 11 avril 1984 à Biella, d\'un père, petit commerçant napolitain établi à Piombino où elle passe une partie de son adolescence, et d\'une mère enseignante en primaire originaire du Piémont. Ses parents divorcent. Enfant unique, Avallone poursuit des études de lettres et de philosophie à Bologne. Elle se marie à un libraire. Ils habitent à Bologne. Son premier recueil de poésie, Il libro dei vent’anni, paraît en 2007. Elle écrit également des nouvelles, éditées dans des revues littéraires3,4. D\'acier (Acciaio), son premier roman, est édité en 2010 par Rizzoli. L\'action se déroule à Piombino, cette ville ouvrière de Toscane où l\'auteure a vécu. Silvia Avallone plonge ses héros dans les chaudrons d\'une aciérie bien réelle de cette ville,l\'aciérie Lucchini, qui employait plus de vingt mille ouvriers dans les années 1960 et qui en emploie deux mille aujourd\'hui. L\'ouvrage se vend à 350 000 exemplaires en Italie et est traduit en plusieurs langues. Il remporte le prix Campiello Opera Prima et est finaliste du prix Strega. En France, traduit chez Liana Levi par Françoise Brun, il reçoit le prix des lecteurs de L\'Express et est élu « meilleur premier roman étranger » par la rédaction du magazine Lire. D\'acier, l\'adaptation cinématographique du roman, est réalisée par Stefano Mordini. En 2012, le film est présenté à la Mostra de Venise. Son second roman, Marina Bellezza (it), paraît en 2013. L\'année suivante, il est traduit en français par Françoise Brun et publié par Liana Levi. En 2018, paraît en France son troisième roman, La vie parfaite, aux éditions Liana Lévi. Elle y narre l\'histoire croisée de deux femmes confrontées à la question de la maternité dans ce qu\'elle appelle l\'Italie périphérique.');
        $avallone->setImage('avallone.jpg');

        $manager->persist($avallone);
        $this->addReference(self::AVALLONE, $avallone);

        $prato = new Auteurs();
        $prato->setPrenomAuteur('Dolores');
        $prato->setNomAuteur('Prato');
        $prato->setBiographieAuteur('Tôt écartelée ­depuis qu\'elle a été confiée, à l\'âge de 10 ans, à un internat de soeurs visitandines­ entre un monde d\'avant et un monde d\'après, Dolores Prato aura passé sa vie à tenter d\'effacer la frontière qui partage le dehors et le dedans, les paroles et les choses. Vainement. Son oeuvre elle-même est restée à l\'état de fragments, de membres désarticulés que les éditeurs, croyant la reconstituer vite et bien, ont fini par couper et découper allégrement. Et de manière saugrenue, comme s\'il s\'agissait de sauver une écriture qui n\'en avait nul besoin, vouée dès l\'origine à sa propre perte ­à couler indéfiniment vers le néant à l\'instar du monde avec lequel elle entendait de toutes ses forces se confondre. Car la brisure était bien plus profonde, remontant à la naissance même de Dolores Prato, à Rome en 1892. Fille illégitime d\'un père qui ne la reconnaît pas et d\'une mère d\'origine juive qui l\'abandonne très vite, elle est recueillie par un oncle prêtre. Ce sont les années du bonheur, le paradis perdu dans un village reculé des Marches, avant que ce même oncle qui pourtant l\'aime ne parvienne ­pour son bien­ à la faire accepter, nonobstant l\'irrégularité de ses origines, dans un collège tenu par un ordre contemplatif. En cette institution, connue à l\'époque comme un haut lieu d\'éducation des jeunes filles de la noblesse romaine, elle reste jusqu\'à ses 18 ans, jusqu\'à son retour à Rome pour y suivre des études de lettres. A cette expérience, et notamment à sa dernière année, Dolores Prato consacrera Brûlures, son seul texte achevé, une nouvelle que la critique salua comme «parfaite» à sa parution en 1965.
        De mystérieux, dans ce couvent dont les nonnes sont soumises à la clôture la plus rigide, il n\'y a que tout ce qui se trouve à l\'extérieur alors que les mystères célestes semblent la chose la mieux partagée, dont on parle avec la plus grande précision et le plus bel à-propos. En revanche «quand il s\'agissait de mystères terrestres, ils étaient nerveux, rapides, sous-entendus plutôt que développés: C\'étaient des allusions si fuyantes qu\'elles ressemblaient au geste de celui qui touche quelque chose de brûlant. Et en effet, on évoquait souvent certaines "brûlures", sans plus de précisions, que le "monde" avait l\'habitude d\'infliger à ceux qui avaient trop de familiarité avec lui.» Les bonnes soeurs veulent à tout prix éviter de telles brûlures à Dolores. Elle est pratiquement orpheline, et le couvent a placé sur elle sa charité comme une sorte de capital qu\'il entend, le moment venu, récupérer avec les intérêts. Il ne leur semble donc ni fou ni illégitime de penser que la petite Dolores effrayée par ses premières brûlures leur revienne à jamais. Et elle se brûlera, jusqu\'au troisième degré, dans sa première journée de sa vie passée à la mer, et arborera ses cicatrices comme autant de tatouages marquant un passage initiatique. Ce sera finalement une fraîche rose rouge arborée sur ses cheveux en pleines matines qui signifiera aux nonnes horrifiées que l\'oiseau ne tardera pas à prendre son envol. Après une maîtrise de lettres, Dolores Prato enseigne dans des lycées de Toscane, des Marches et, enfin, de Rome. En 1938, à la suite des lois raciales promulguées par Mussolini, elle est exclue de l\'enseignement. Elle n\'y reviendra plus. Vivant de cours particuliers et de collaborations à différents quotidiens, elle se consacre à l\'écriture et réécriture de sa vie. En 1980 Einaudi publie son unique roman: Giù la piazza non c\'é nessuno (Bas dans la place il n\'y a personne). Avec ce récit de son enfance sauvage avant son entrée au couvent, Dolores Prato devient, à presque 90 ans, un cas littéraire. Elle meurt en 1983, sans que soit entièrement reconnue la grandeur de l\'éternelle débutante qui, au temps des Brûlures avait entrevu s\'ouvrir «une chose si grande qu\'elle commençait avec l\'océan et s\'achevait avec la vie».');
        $prato->setImage('prato.jpg');

        $manager->persist($prato);
        $this->addReference(self::PRATO, $prato);

        $manager->flush();
    }
}