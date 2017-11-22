<?php

namespace SnowTricksBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use SnowtricksBundle\Entity\Trick;
use SnowtricksBundle\Entity\Image;
use SnowtricksBundle\Entity\Video;
use SnowTricksBundle\Entity\Category;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName("grab");

        $manager->persist($category);
        $manager->flush();

        $trick = new Trick();
        $trick->setName('seatbelt and backflip l\'la');
        $trick->setDescription('Ici on décrira seatbelt...');

        $trick->setCategory($category);

        $image1 = new Image();
        $image1->setName('image1.jpg');
        $image2 = new Image();
        $image2->setName('image2.jpg');

        $trick->addImage($image1);
        $trick->addImage($image2);

        $video1 = new Video();
        $video1->setLink('eokodke.com');
        $video2 = new Video();
        $video2->setLink('fzddnfp.com');

        $trick->addVideo($video1);
        $trick->addVideo($video2);

        $manager->persist($trick);

        $manager->flush();

        $trick->removeVideo($video1);

        $manager->flush();
    }
}
