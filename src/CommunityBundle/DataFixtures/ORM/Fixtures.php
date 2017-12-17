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
        $user->setLastName('Lemenuel');
        $user->setEmail('nabil.lemenuel@gmx.fr');
        $user->setPlainPassword('iliketurtles');

        $manager->persist($user);
        $manager->flush($user);
    }
}
