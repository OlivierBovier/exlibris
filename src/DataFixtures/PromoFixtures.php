<?php

namespace App\DataFixtures;

use App\Entity\Promo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PromoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $abd10 = new Promo();
        $abd10->setCodePromo('ABD10');
        $abd10->setRemise(10);
        $abd10->setCommentaire('Remise accordée aux clients sur abandon de panier');
        $manager->persist($abd10);

        $rtr5 = new Promo();
        $rtr5->setCodePromo('RTR5');
        $rtr5->setRemise(5);
        $rtr5->setCommentaire('Remise de la rentrée litéraire');
        $manager->persist($rtr5);

        $fide20 = new Promo();
        $fide20->setCodePromo('FID20');
        $fide20->setCommentaire('Remise de fidélité');
        $fide20->setRemise(20);
        $manager->persist($fide20);

        $manager->flush();
    }
}
