<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AvisFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $avisAsta1 = new Avis();
        $avisAsta1->setLivre($this->getReference(LivresFixtures::ASTA));
        $avisAsta1->setUser($this->getReference(UserFixtures::ANNE_LAURE));
        $avisAsta1->setCommentaire('Très beau livre. Je le recommande.');
        $avisAsta1->setNote(4);
        $avisAsta1->setDateAvis(new \DateTime());
        $manager->persist($avisAsta1);

        $avisAsta2 = new Avis();
        $avisAsta2->setLivre($this->getReference(LivresFixtures::ASTA));
        $avisAsta2->setUser($this->getReference(UserFixtures::OLIVIER));
        $avisAsta2->setCommentaire('Un chef d\'oeuvre haletant de la première à la dernière page !');
        $avisAsta2->setNote(5);
        $avisAsta2->setDateAvis(new \DateTime());
        $manager->persist($avisAsta2);

        $avisbas1 = new Avis();
        $avisbas1 ->setLivre($this->getReference(LivresFixtures::BASLAPLACE));
        $avisbas1 ->setUser($this->getReference(UserFixtures::ANNE_LAURE));
        $avisbas1 ->setCommentaire('Une plongée dans une enfance difficile. Un style magnifique !');
        $avisbas1 ->setNote(4);
        $avisbas1 ->setDateAvis(new \DateTime());
        $manager->persist($avisbas1);

        $avisbas2 = new Avis();
        $avisbas2->setLivre($this->getReference(LivresFixtures::BASLAPLACE));
        $avisbas2->setUser($this->getReference(UserFixtures::OLIVIER));
        $avisbas2->setCommentaire('Je me suis endormi à la 3ème page, C\'est un très bon somnifère !');
        $avisbas2->setNote(2);
        $avisbas2->setDateAvis(new \DateTime());
        $manager->persist($avisbas2);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            LivresFixtures::class,
            UserFixtures::class,
        );
    }

}
