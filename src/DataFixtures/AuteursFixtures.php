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
    public const WAUTERS = 'wauters';

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

        $wauters = new Auteurs();
        $wauters->setPrenomAuteur('Antoine');
        $wauters->setNomAuteur('Wauters');
        $wauters->setBiographieAuteur('Antoine Wauters a étudié la philosophie à l\'Université Libre de Bruxelles, où les cours de Jacques Sojcher vont particulièrement le marquer. C\'est grâce à lui qu\'il découvre Nietzsche, qu\'on retrouve dans son roman Nos mères. Ses études terminées, il gagne sa vie en effectuant des remplacements dans l\'enseignement, devenant tour à tour professeur de français et de religion dans le secondaire, puis de philosophie, à la Haute École Charlemagne. Il publie ses premiers livres en 2008, trois recueils de poésie. L\'un d\'eux, Debout sur la langue, reçoit le Prix Emile Polak de l\'Académie royale de langue et de littérature françaises de Belgique. En 2012, son récit poétique Césarine de nuit, chez Cheyne Éditeur, reçoit le Prix Marcel Thiry et le Prix de littérature française de la ville de Tournai, avant d\'être lu dans divers festivals par la comédienne Isabelle Nanty1,2. Dans le cadre de l\'exposition consacrée aux photographies de l\'artiste américain Cy Twombly organisée par Bozar3, il publie parallèlement Poésie pour Cy Twombly. Devenu éditeur chez Cheyne et directeur de la collection IF à l\'Arbre à paroles, il publie son premier roman chez Verdier en 2014. Rapidement remarqué, Nos mères reçoit le Prix Première de la RTBF, le Prix Révélation de la SGDL et est finaliste du Prix des cinq continents de la Francophonie, faisant d\'Antoine Wauters "la révélation littéraire belge de ces dernières années", selon les magazines Mariane et Focus Vif4. En 2015, le film Préjudice, long métrage d\'Antoine Cuypers qu\'Antoine Wauters a coscénarisé, sort en salles. Il réunit Nathalie Baye, Arno, Thomas Blanchard, Ariane Labed et Éric Caravaca. En novembre 2017, il participe à la première Nuit des Écrivains, organisée par Myriam Leroy et Pascal Claude, journalistes à la Première, aux côtés des écrivains Geneviève Damas, Laurent Gaudé, Joy Sorman et Abdallah Taia. Depuis mars 2018, il intervient ponctuellement comme professeur dans le cadre de L\'atelier des écritures contemporaines, Master de création littéraire de La Cambre.');
        $wauters->setImage('wauters.jpg');

        $manager->persist($wauters);
        $this->addReference(self::WAUTERS, $wauters);

        $manager->flush();
    }
}