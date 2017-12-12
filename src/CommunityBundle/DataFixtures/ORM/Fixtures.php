<?php

namespace CommunityBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\File;
use CommunityBundle\Entity\User;
use CommunityBundle\Entity\Avatar;
use CommunityBundle\Entity\Message;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Nabil');
        $user->setLastname('Lemenuel');
        $user->setEmail('nabil.lemenuel@gmx.fr');
        $user->setPassword('symfony');

        $avatar = new Avatar();
        $avatar->setFile(new File('C:\Users\nabil\Pictures\chalet_8/CYANELLA 2017_Photo_by_Alexandre_Van_Battel-7.jpg'));

        $user->setAvatar($avatar);
        $manager->persist($user);
        $manager->flush();

        $user->setAvatar();
        $manager->persist($user);
        $manager->flush();
    }
}
