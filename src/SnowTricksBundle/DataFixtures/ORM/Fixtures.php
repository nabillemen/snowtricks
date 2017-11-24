<?php

namespace SnowTricksBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use SnowtricksBundle\Entity\Trick;
use SnowtricksBundle\Entity\Image;
use SnowtricksBundle\Entity\Video;
use SnowTricksBundle\Entity\Category;
use Symfony\Component\HttpFoundation\File\File;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
        $category = new Category();
        $category->setName("grab");

        $manager->persist($category);
        $manager->flush();

        $trick = new Trick();
        $trick->setName('seatbelt and backflip l\'la');
        $trick->setDescription('Ici on décrira seatbelt...');

        $trick->setCategory($category);

        $image1 = new Image();
        $image1->setFile(new File('C:\Users\nabil\Pictures\chalet_5\fkjeffz.jpg'));

        $trick->addImage($image1);

        $video1 = new Video();
        $video1->setTag('src="bonjour"');
        $video2 = new Video();
        $video2->setTag('src="www.helloworld.com"');

        $trick->addVideo($video1);
        $trick->addVideo($video2);

        $manager->persist($trick);

        $manager->flush();

        $trick->removeVideo($video1);

        $manager->flush();
        */
        $category = new Category();
        $category->setName("grab");
        $manager->persist($category);
        $manager->flush();

        $image = new Image();
        $image->setFile(new File('C:\Users\nabil\Pictures\chalet_3\15.jpg'));

        $trick = new Trick();
        $trick->setName('seatbelt and backflip l\'la');
        $trick->setDescription('Ici on décrira seatbelt...');
        $trick->setCategory($category);
        $trick->addImage($image);
        $video1 = new Video();
        $video1->setTag('src="bonjour"');
        $video2 = new Video();
        $video2->setTag('src="www.helloworld.com"');
        $trick->addVideo($video1);
        $trick->addVideo($video2);

        $manager->persist($trick);
        $manager->flush();

    }
}
