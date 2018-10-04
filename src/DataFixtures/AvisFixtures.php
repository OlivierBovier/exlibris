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
        $avisAsta2->setCommentaire('Un chef d\'oeuvre halletant de la première à la dernière page !');
        $avisAsta2->setNote(5);
        $avisAsta2->setDateAvis(new \DateTime());
        $manager->persist($avisAsta2);

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
