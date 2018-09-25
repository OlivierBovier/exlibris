<?php
// src/DataFixtures/UserFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public const ADMIN = 'admin';
    public const ANNE_LAURE = 'anne_laure';
    public const OLIVIER = 'olivier';

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {        
        $admin = new User();
        $admin->setUsername('Admin');
        $admin->setEmail('admin@exlibris.fr');
        $admin->setAdresse('18 avenue Foch');
        $admin->setCodePostal('75000');
        $admin->setVille('Paris');
        $hash = $this->encoder->encodePassword($admin, 'a1b2c3d4');
        $admin->setPassword($hash);
        $admin->addRole('ROLE_USER');
        $admin->addRole('ROLE_ADMIN');
        $admin->addRole('ROLE_SUPER_ADMIN');
        $admin->setCreatedAt(new \DateTime());

        $manager->persist($admin);
        $this->addReference(self::ADMIN, $admin);

        $Anne_Laure = new User();
        $Anne_Laure->setUsername('Anne-Laure Dupont');
        $Anne_Laure->setEmail('anne_laure@free.fr');
        $Anne_Laure->setAdresse('1 rue des Fleurs');
        $Anne_Laure->setCodePostal('92000');
        $Anne_Laure->setVille('Rueil');
        $hash = $this->encoder->encodePassword($Anne_Laure, 'a1b2c3d4');
        $Anne_Laure->setPassword($hash);
        $Anne_Laure->addRole('ROLE_USER');
        $Anne_Laure->setCreatedAt(new \DateTime());

        $manager->persist($Anne_Laure);
        $this->addReference(self::ANNE_LAURE, $Anne_Laure);

        $Olivier = new User();
        $Olivier->setUsername('Olivier Legrand');
        $Olivier->setEmail('olivier.bovier@free.fr');
        $Olivier->setAdresse('1 Square Vivaldi');
        $Olivier->setCodePostal('78150');
        $Olivier->setVille('Le Chesnay');
        $hash = $this->encoder->encodePassword($Olivier, 'a1b2c3d4');
        $Olivier->setPassword($hash);
        $Olivier->addRole('ROLE_USER');
        $Olivier->setCreatedAt(new \DateTime());

        $manager->persist($Olivier);
        $this->addReference(self::OLIVIER, $Olivier);

        $manager->flush();
    }
}