<?php
// src/DataFixtures/CategoriesFixtures.php
namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public const ROMAN_FR = 'roman_fr';
    public const ROMAN_ETR = 'roman_etr';
    public const BD = 'bd';
    public const ANTICIPATION = 'anticipation';
    public const JEUNESSE = 'jeunesse';

    public function load(ObjectManager $manager)
    {
        
        $romanfr = new Categories();
        $romanfr->setLibelleCategorie('Roman français');

        $manager->persist($romanfr);
        $this->addReference(self::ROMAN_FR, $romanfr);

        $roman_etr = new Categories();
        $roman_etr->setLibelleCategorie('Roman étranger');

        $manager->persist($roman_etr);
        $this->addReference(self::ROMAN_ETR, $roman_etr);

        $bd = new Categories();
        $bd->setLibelleCategorie('Bande dessinée');

        $manager->persist($bd);
        $this->addReference(self::BD, $bd);

        $anticipation = new Categories();
        $anticipation->setLibelleCategorie('Anticipation');

        $manager->persist($anticipation);
        $this->addReference(self::ANTICIPATION, $anticipation);

        $litt_jeunesse = new Categories();
        $litt_jeunesse->setLibelleCategorie('Littérature jeunesse');

        $manager->persist($litt_jeunesse);
        $this->addReference(self::JEUNESSE, $litt_jeunesse);


        $manager->flush();
    }
}