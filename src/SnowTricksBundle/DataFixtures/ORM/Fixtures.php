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
        $names = ['slide', 'rotation', 'flip'];
        
        foreach ($names as $names) {
            $category = new Category();
            $category->setName($name);

            $manager->persist($category);
        }

        $manager->flush();
    }
}
