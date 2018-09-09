<?php
// src/DataFixtures/CategoriesFixtures.php
namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public const ROMAN = 'roman';
    public const BD = 'bd';
    public const ANTICIPATION = 'anticipation';

    public function load(ObjectManager $manager)
    {
        
        $roman = new Categories();
        $roman->setLibelleCategorie('Roman');

        $manager->persist($roman);
        $this->addReference(self::ROMAN, $roman);

        $bd = new Categories();
        $bd->setLibelleCategorie('Bande dessinée');

        $manager->persist($bd);
        $this->addReference(self::BD, $bd);

        $anticipation = new Categories();
        $anticipation->setLibelleCategorie('Anticipation');

        $manager->persist($anticipation);
        $this->addReference(self::ANTICIPATION, $anticipation);


        $manager->flush();
    }
}