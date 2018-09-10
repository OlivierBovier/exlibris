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
        $miserables->setAuteur($this->getReference(AuteursFixtures::HUGO));
        $miserables->setEditeur($this->getReference(EditeursFixtures::FLAMMARION));
        $miserables->addCategory($this->getReference(CategoriesFixtures::ROMAN));
        $miserables->setISBN('978-2-253-09633-7');
        $miserables->setTitre('Les Misérables');
        $miserables->setNbPages(992);
        $miserables->setDateParution(\DateTime::createFromFormat('Y-m-d', "1862-03-30"));
        $miserables->setPrixHt(12.5);
        $miserables->setEstConseil(1);
        $miserables->setResume('Peut-on imaginer un monde sans Jean Valjean, Cosette, Gavroche, Javert ou Fantine, à jamais vivants au Panthéon de l\'esprit humain ? En 1862 paraissent Les Misérables, qui désignent toutes les victimes d\'un ordre social dont Victor Hugo condamne les injustices. Immense épopée populaire, le roman est emporté dans l\'air de Paris et de ses bas-fonds, l\'odeur des barricades et de la Révolution. Il deviendra l\'une des œuvres les plus lues dans le monde. On dit que lorsque les premières épreuves sortaient des presses, les correcteurs et les imprimeurs pleuraient.');
        $manager->persist($miserables);

        $particule = new Livres();
        $particule->setAuteur($this->getReference(AuteursFixtures::HOUELLEBECQ));
        $particule->setEditeur($this->getReference(EditeursFixtures::FLAMMARION));
        $particule->addCategory($this->getReference(CategoriesFixtures::ROMAN));
        $particule->setISBN('978-2-080-67472-2');
        $particule->setTitre('Les Particules élémentaires');
        $particule->setNbPages(317);
        $particule->setDateParution(\DateTime::createFromFormat('Y-m-d', "1998-08-24"));
        $particule->setPrixHt(8.10);
        $particule->setEstConseil(1);
        $particule->setResume('Michel, chercheur en biologie rigoureusement déterministe, incapable d\'aimer, gère le déclin de sa sexualité en se consacrant au travail, à son Monoprix et aux tranquillisants. Une année sabbatique donne à ses découvertes un tour qui bouleversera la face du monde. Bruno, de son côté, s\'acharne en une quête désespérée du plaisir sexuel. Un séjour au " Lieu du Changement ", camping post-soixante-huitard tendance New Age, changera-t-il sa vie ? Un soir, une inconnue à la bouche hardie lui fait entrevoir la possibilité pratique du bonheur. Par leur parcours familial et sentimental chaotique, les deux demi-frères illustrent de manière exemplaire la société d\'aujourd\'hui et la quête complexe de l\'amour vrai.');
        $manager->persist($particule);

        $asonimage = new Livres();
        $asonimage->setAuteur($this->getReference(AuteursFixtures::FERRARI));
        $asonimage->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $asonimage->addCategory($this->getReference(CategoriesFixtures::ROMAN));
        $asonimage->setISBN('978-2-330-10944-8');
        $asonimage->setTitre('A son image');
        $asonimage->setNbPages(317);
        $asonimage->setDateParution(\DateTime::createFromFormat('Y-m-d', "2018-08-22"));
        $asonimage->setPrixHt(19.50);
        $asonimage->setEstConseil(0);
        $asonimage->setResume('Ce somptueux roman en forme de requiem pour une photographe défunte est aussi l’occasion d’évoquer le nationalisme corse, la violence des guerres modernes et les liens ambigus qu’entretiennent l’image, la photographie, le réel et la mort.');
        $manager->persist($asonimage);

        $sermon = new Livres();
        $sermon->setAuteur($this->getReference(AuteursFixtures::FERRARI));
        $sermon->setEditeur($this->getReference(EditeursFixtures::ACTESSUD));
        $sermon->addCategory($this->getReference(CategoriesFixtures::ROMAN));
        $sermon->setISBN('978-2-330-02280-8');
        $sermon->setTitre('Le sermon sur la chute de Rome');
        $sermon->setNbPages(2208);
        $sermon->setDateParution(\DateTime::createFromFormat('Y-m-d', "2013-08-17"));
        $sermon->setPrixHt(7.7);
        $sermon->setEstConseil(1);
        $sermon->setResume('Dans un village corse perché loin de la côte, le bar local est en train de connaître une mutation profonde sous l\'impulsion de ses nouveaux gérants. A la sur-prise générale, ces deux enfants du pays ont tourné le dos à de prometteuses études de philosophie sur le continent pour, fidèles aux enseignements de Leibniz, transformer un modeste débit de boissons en "meilleur des mondes possibles". Mais c\'est bientôt l\'enfer en personne qui s\'invite au comptoir, réactivant les blessures anciennes d\'êtres assujettis à d\'indigents rêves de bonheur et victimes, à leur insu, de la tragique propension de l\'âme humaine à se corrompre. Entrant par-delà les siècles en résonance avec le sermon par lequel saint Augustin tenta de consoler ses fidèles de la fragilité des royaumes terrestres, Jérôme Ferrari jette, au fil d\'une écriture somptueuse, une lumière impitoyable sur la malédiction qui condamne les mortels à voir s\'effondrer les mondes qu\'ils édifient et à refonder sans trêve, sur le sang ou les larmes, leurs impossibles mythologies.');
        $manager->persist($sermon);

        $passagers = new Livres();
        $passagers->setAuteur($this->getReference(AuteursFixtures::BOURGEON));
        $passagers->setEditeur($this->getReference(EditeursFixtures::GLENAT));
        $passagers->addCategory($this->getReference(CategoriesFixtures::BD));
        $passagers->setISBN('978-2-723-40132-4');
        $passagers->setTitre('Les Passagers du Vent - La Fille sous la dunette');
        $passagers->setNbPages(48);
        $passagers->setDateParution(\DateTime::createFromFormat('Y-m-d', "1980-01-01"));
        $passagers->setPrixHt(14.5);
        $passagers->setEstConseil(1);
        $passagers->setResume('"La Fille sous la dunette" est le premier des cinq tomes des "Passagers du Vent", série créée par François Bourgeon. XVIIIe siècle, à bord d\'un navire. Hoël Tragan aperçoit deux jeunes femmes sous la dunette. Piqué par la curiosité, il s\'aventure dans la zone interdite à l\'équipage. Repéré, il est arrêté et mis aux fers. Il reçoit alors la visite d\'un "jeune homme" qui s\'avère être Isa, l\'une des filles qu\'il avait vues. Isa lui racontera comment, jeune enfant, elle avait changé d\'identité avec son amie par jeu, ce qui lui valut de perdre son titre de noblesse. Après diverses péripéties, notamment un combat contre des vaisseaux britanniques, Hoël est fait prisonnier par la Royal Navy...');
        $manager->persist($passagers);

        $meilleurmonde = new Livres();
        $meilleurmonde->setAuteur($this->getReference(AuteursFixtures::HUXLEY));
        $meilleurmonde->setEditeur($this->getReference(EditeursFixtures::POCKET));
        $meilleurmonde->addCategory($this->getReference(CategoriesFixtures::ANTICIPATION));
        $meilleurmonde->setISBN('978-2-266-28303-8');
        $meilleurmonde->setTitre('Le meilleur des mondes');
        $meilleurmonde->setNbPages(320);
        $meilleurmonde->setDateParution(\DateTime::createFromFormat('Y-m-d', "1932-01-01"));
        $meilleurmonde->setPrixHt(4.95);
        $meilleurmonde->setEstConseil(1);
        $meilleurmonde->setResume('Demain, le bonheur sera universel. Et obligatoire ! Dans le meilleur des mondes les foetus sont « préparés» dans des incubatrices en fonction du rôle qu\'on leur destine. Les futurs Alphas, de la caste des élites, reçoivent plus d\'oxygène, plus de «pseudo sang». Quant aux futurs Epsilons, à qui l\'on réserve les tâches les plus pénibles, on veille à ne pas développer leurs facultés intellectuelles : un bon ouvrier n\'a pas besoin de penser. Dans le meilleur des mondes, un système éducatif qui façonne les esprits comme les corps, une société communautaire qui proscrit l\'individualisme, où la cellule familiale ne peut exister. Dans ce meilleur des mondes méthodiquement planifié pour construire les hommes en fonction des besoins, pour contraindre un bonheur artificiel, pour museler les passions et les interrogations, il y aura bien un grain de sable pour s\'insérer dans les rouages. Un récit incontournable écrit en 1931, qui n\'a pas fini d\'influencer écrivains et cinéastes. ');
        $manager->persist($meilleurmonde);

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