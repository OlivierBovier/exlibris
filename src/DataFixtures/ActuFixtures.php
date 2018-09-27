<?php
// src/DataFixtures/ActuFixtures.php
namespace App\DataFixtures;

use App\Entity\Actu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ActuFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $actu1 = new Actu();
        $actu1->setTitre('Festival bd');
        $actu1->setAccroche('Ouvert aux enfants de 7 à 77 ans !');
        $actu1->setContenu('Festival bd');
        $actu1->setImage('festival_bd.jpg');
        $manager->persist($actu1);

        $actu2 = new Actu();
        $actu2->setTitre('Des livres pour cet été');
        $actu2->setAccroche('A lire sur la plage, sans modération !');
        $actu2->setContenu('Des livres pour cet été');
        $actu2->setImage('livre_ete.jpg');
        $manager->persist($actu2);

        $actu3 = new Actu();
        $actu3->setTitre('Sélection des lecteurs');
        $actu3->setAccroche('Ils vous disent tout sur les livres qu\'ils ont aimé !');
        $actu3->setContenu('Sélection des lecteurs');
        $actu3->setImage('echelle.jpg');
        $manager->persist($actu3);

        $actu4 = new Actu();
        $actu4->setTitre('Séance de dédicace');
        $actu4->setAccroche('Jérôme Philibert viendra signer son dernier roman !');
        $actu4->setContenu('Séance de dédicace');
        $actu4->setImage('dedicace.jpg');
        $manager->persist($actu4);

        $manager->flush();
    }
}
