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
        $actu1->setContenu('Sed imperdiet turpis non molestie scelerisque. Nullam dignissim sem id porttitor aliquam. Morbi blandit nibh urna, vel rhoncus augue rutrum ut. Aenean nibh metus, porttitor id dapibus in, pharetra in quam. In elementum pulvinar elit, in tempus nisi efficitur ac. Ut dolor nisl, sagittis non libero et, dictum finibus mauris. Praesent condimentum tincidunt dui sed interdum. Cras viverra ex ut nibh lobortis fermentum. Maecenas nec sapien quis tortor tincidunt volutpat. Maecenas mi velit, gravida non tellus nec, vulputate convallis velit. Donec consequat nibh eleifend elit dignissim, sed pulvinar mauris luctus. Nam ac risus eget libero aliquet sodales nec ut augue. Aenean commodo arcu leo, ut faucibus lorem blandit ut. Phasellus dictum leo id eros mattis euismod.

Etiam nisl magna, facilisis in lacus id, consectetur cursus ipsum. Mauris ipsum nisi, efficitur ut eros ac, vulputate aliquet elit. Praesent condimentum laoreet metus eu molestie. Phasellus eget leo ornare, vehicula risus a, cursus eros. Donec quis quam magna. Phasellus non mi dictum mauris volutpat dignissim. Mauris eget finibus velit. Donec semper egestas dolor, nec ullamcorper metus pulvinar ut. Morbi ipsum dui, efficitur id rutrum sed, egestas ac urna. Donec posuere facilisis mauris, a cursus orci congue et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec aliquet est id nibh dignissim, id sagittis magna sagittis. Nulla sed elit at diam egestas euismod a quis arcu. Fusce id sagittis erat. Praesent in nisi congue, euismod libero id, varius lorem.

Suspendisse nec lacus condimentum, semper leo a, congue lectus. Phasellus vitae congue diam, non gravida libero. Nulla non est iaculis libero ultrices pharetra. Pellentesque sed felis vehicula, maximus felis in, eleifend eros. Vestibulum ac dictum diam. Maecenas purus sapien, vehicula nec sollicitudin id, faucibus in velit. Aliquam et risus id dui mollis porta quis et lectus. Fusce euismod suscipit tellus sit amet mollis. Praesent non lobortis dui. Cras ut quam sapien.');
        $actu1->setImage('festival_bd.jpg');
        $manager->persist($actu1);

        $actu2 = new Actu();
        $actu2->setTitre('Des livres pour cet été');
        $actu2->setAccroche('A lire sur la plage, sans modération !');
        $actu2->setContenu('Sed imperdiet turpis non molestie scelerisque. Nullam dignissim sem id porttitor aliquam. Morbi blandit nibh urna, vel rhoncus augue rutrum ut. Aenean nibh metus, porttitor id dapibus in, pharetra in quam. In elementum pulvinar elit, in tempus nisi efficitur ac. Ut dolor nisl, sagittis non libero et, dictum finibus mauris. Praesent condimentum tincidunt dui sed interdum. Cras viverra ex ut nibh lobortis fermentum. Maecenas nec sapien quis tortor tincidunt volutpat. Maecenas mi velit, gravida non tellus nec, vulputate convallis velit. Donec consequat nibh eleifend elit dignissim, sed pulvinar mauris luctus. Nam ac risus eget libero aliquet sodales nec ut augue. Aenean commodo arcu leo, ut faucibus lorem blandit ut. Phasellus dictum leo id eros mattis euismod.

Etiam nisl magna, facilisis in lacus id, consectetur cursus ipsum. Mauris ipsum nisi, efficitur ut eros ac, vulputate aliquet elit. Praesent condimentum laoreet metus eu molestie. Phasellus eget leo ornare, vehicula risus a, cursus eros. Donec quis quam magna. Phasellus non mi dictum mauris volutpat dignissim. Mauris eget finibus velit. Donec semper egestas dolor, nec ullamcorper metus pulvinar ut. Morbi ipsum dui, efficitur id rutrum sed, egestas ac urna. Donec posuere facilisis mauris, a cursus orci congue et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec aliquet est id nibh dignissim, id sagittis magna sagittis. Nulla sed elit at diam egestas euismod a quis arcu. Fusce id sagittis erat. Praesent in nisi congue, euismod libero id, varius lorem.

Suspendisse nec lacus condimentum, semper leo a, congue lectus. Phasellus vitae congue diam, non gravida libero. Nulla non est iaculis libero ultrices pharetra. Pellentesque sed felis vehicula, maximus felis in, eleifend eros. Vestibulum ac dictum diam. Maecenas purus sapien, vehicula nec sollicitudin id, faucibus in velit. Aliquam et risus id dui mollis porta quis et lectus. Fusce euismod suscipit tellus sit amet mollis. Praesent non lobortis dui. Cras ut quam sapien. ');
        $actu2->setImage('livre_ete.jpg');
        $manager->persist($actu2);

        $actu3 = new Actu();
        $actu3->setTitre('Sélection des lecteurs');
        $actu3->setAccroche('Ils vous disent tout sur les livres qu\'ils ont aimé !');
        $actu3->setContenu('Sed imperdiet turpis non molestie scelerisque. Nullam dignissim sem id porttitor aliquam. Morbi blandit nibh urna, vel rhoncus augue rutrum ut. Aenean nibh metus, porttitor id dapibus in, pharetra in quam. In elementum pulvinar elit, in tempus nisi efficitur ac. Ut dolor nisl, sagittis non libero et, dictum finibus mauris. Praesent condimentum tincidunt dui sed interdum. Cras viverra ex ut nibh lobortis fermentum. Maecenas nec sapien quis tortor tincidunt volutpat. Maecenas mi velit, gravida non tellus nec, vulputate convallis velit. Donec consequat nibh eleifend elit dignissim, sed pulvinar mauris luctus. Nam ac risus eget libero aliquet sodales nec ut augue. Aenean commodo arcu leo, ut faucibus lorem blandit ut. Phasellus dictum leo id eros mattis euismod.

Etiam nisl magna, facilisis in lacus id, consectetur cursus ipsum. Mauris ipsum nisi, efficitur ut eros ac, vulputate aliquet elit. Praesent condimentum laoreet metus eu molestie. Phasellus eget leo ornare, vehicula risus a, cursus eros. Donec quis quam magna. Phasellus non mi dictum mauris volutpat dignissim. Mauris eget finibus velit. Donec semper egestas dolor, nec ullamcorper metus pulvinar ut. Morbi ipsum dui, efficitur id rutrum sed, egestas ac urna. Donec posuere facilisis mauris, a cursus orci congue et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec aliquet est id nibh dignissim, id sagittis magna sagittis. Nulla sed elit at diam egestas euismod a quis arcu. Fusce id sagittis erat. Praesent in nisi congue, euismod libero id, varius lorem.

Suspendisse nec lacus condimentum, semper leo a, congue lectus. Phasellus vitae congue diam, non gravida libero. Nulla non est iaculis libero ultrices pharetra. Pellentesque sed felis vehicula, maximus felis in, eleifend eros. Vestibulum ac dictum diam. Maecenas purus sapien, vehicula nec sollicitudin id, faucibus in velit. Aliquam et risus id dui mollis porta quis et lectus. Fusce euismod suscipit tellus sit amet mollis. Praesent non lobortis dui. Cras ut quam sapien. ');
        $actu3->setImage('echelle.jpg');
        $manager->persist($actu3);

        $actu4 = new Actu();
        $actu4->setTitre('Séance de dédicace');
        $actu4->setAccroche('Jérôme Philibert viendra signer son dernier roman !');
        $actu4->setContenu('Sed imperdiet turpis non molestie scelerisque. Nullam dignissim sem id porttitor aliquam. Morbi blandit nibh urna, vel rhoncus augue rutrum ut. Aenean nibh metus, porttitor id dapibus in, pharetra in quam. In elementum pulvinar elit, in tempus nisi efficitur ac. Ut dolor nisl, sagittis non libero et, dictum finibus mauris. Praesent condimentum tincidunt dui sed interdum. Cras viverra ex ut nibh lobortis fermentum. Maecenas nec sapien quis tortor tincidunt volutpat. Maecenas mi velit, gravida non tellus nec, vulputate convallis velit. Donec consequat nibh eleifend elit dignissim, sed pulvinar mauris luctus. Nam ac risus eget libero aliquet sodales nec ut augue. Aenean commodo arcu leo, ut faucibus lorem blandit ut. Phasellus dictum leo id eros mattis euismod.

Etiam nisl magna, facilisis in lacus id, consectetur cursus ipsum. Mauris ipsum nisi, efficitur ut eros ac, vulputate aliquet elit. Praesent condimentum laoreet metus eu molestie. Phasellus eget leo ornare, vehicula risus a, cursus eros. Donec quis quam magna. Phasellus non mi dictum mauris volutpat dignissim. Mauris eget finibus velit. Donec semper egestas dolor, nec ullamcorper metus pulvinar ut. Morbi ipsum dui, efficitur id rutrum sed, egestas ac urna. Donec posuere facilisis mauris, a cursus orci congue et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec aliquet est id nibh dignissim, id sagittis magna sagittis. Nulla sed elit at diam egestas euismod a quis arcu. Fusce id sagittis erat. Praesent in nisi congue, euismod libero id, varius lorem.

Suspendisse nec lacus condimentum, semper leo a, congue lectus. Phasellus vitae congue diam, non gravida libero. Nulla non est iaculis libero ultrices pharetra. Pellentesque sed felis vehicula, maximus felis in, eleifend eros. Vestibulum ac dictum diam. Maecenas purus sapien, vehicula nec sollicitudin id, faucibus in velit. Aliquam et risus id dui mollis porta quis et lectus. Fusce euismod suscipit tellus sit amet mollis. Praesent non lobortis dui. Cras ut quam sapien. ');
        $actu4->setImage('dedicace.jpg');
        $manager->persist($actu4);

        $manager->flush();
    }
}
