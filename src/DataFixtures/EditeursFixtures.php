<?php
// src/DataFixtures/EditeursFixtures.php
namespace App\DataFixtures;

use App\Entity\Editeurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EditeursFixtures extends Fixture
{
    public const FLAMMARION = 'flammarion';
    public const ACTESSUD = 'actessud';
    public const GLENAT = 'glenat';
    public const POCKET = 'pocket';
    public const VERDIER = 'verdier';
    public const GRASSET = 'grasset';
    public const LIANALEVI = 'lianalevi';

    public function load(ObjectManager $manager)
    {
        
        $flammarion = new Editeurs();
        $flammarion->setNomEditeur('Flammarion');

        $manager->persist($flammarion);
        $this->addReference(self::FLAMMARION, $flammarion);

        $actessud = new Editeurs();
        $actessud->setNomEditeur('Actes Sud');

        $manager->persist($actessud);
        $this->addReference(self::ACTESSUD, $actessud);

        $glenat = new Editeurs();
        $glenat->setNomEditeur('Glénat');

        $manager->persist($glenat);
        $this->addReference(self::GLENAT, $glenat);

        $pocket = new Editeurs();
        $pocket->setNomEditeur('Pocket');

        $manager->persist($pocket);
        $this->addReference(self::POCKET, $pocket);

        $verdier = new Editeurs();
        $verdier->setNomEditeur('Verdier');

        $manager->persist($verdier);
        $this->addReference(self::VERDIER, $verdier);

        $grasset = new Editeurs();
        $grasset->setNomEditeur('Grasset');

        $manager->persist($grasset);
        $this->addReference(self::GRASSET, $grasset);

        $lianalevi = new Editeurs();
        $lianalevi->setNomEditeur('Liana Lévi');

        $manager->persist($lianalevi);
        $this->addReference(self::LIANALEVI, $lianalevi);

        $manager->flush();
    }
}