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



        $manager->flush();
    }
}