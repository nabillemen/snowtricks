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
        $categories = ['grab', 'slide', 'rotation', 'flip'];

        foreach ($categories as $name) {
            $category = new Category();
            $category->setName($name);

            $categories[$name] = $category;

            $manager->persist($category);
        }
        $manager->flush();

        $tricks = array(
            'Bloody Dracula' => array(
                'category' => 'grab',
                'description' => "La main avant derrière le dos, il s'agit d'attraper le queue de la planche, en s'aidant de la main arrière.",
                'images' => array(
                    'bloody-dracula.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/UU9iKINvlyU" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Canadian Bacon' => array(
                'category' => 'grab',
                'description' => "La main arrière doit attraper la planche du côté orteilles. Cela doit se faire en passant la main par l'arrière, entre les jambes.",
                'images' => array(
                    'canadian-bacon.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/6zALCB6WJBI" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Chicken Salad' => array(
                'category' => 'grab',
                'description' => "La main arrière doit attraper la planche du côté des talons. Cela doit se faire en passant la main par l'avant, entre les jambes.",
                'images' => array(
                    'chicken-salad.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/TTgeY_XCvkQ" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Cookie Monster' => array(
                'category' => 'grab',
                'description' => "Les deux mains attrapent le nez. Ensuite il faut mordre le nez de la planche avec la bouche.",
                'images' => array(
                    'cookie-monster.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/gM_PthuQWpk" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Japan' => array(
                'category' => 'grab',
                'description' => "Le main avant entoure le tibia avant et attrape le côté orteille entre les attaches. Les genoux sont pliés, les jambes sont montées vers le haut.",
                'images' => array(
                    'japan.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/jH76540wSqU" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Melon' => array(
                'category' => 'grab',
                'description' => "Attrape la planche avec la main avant, côté talon, entre les attaches.",
                'images' => array(
                    'melon.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/OMxJRz06Ujc" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Roast Beef' => array(
                'category' => 'grab',
                'description' => "La main arrière se place en travers des jambes et attrape le côté talon entre les attaches.",
                'images' => array(
                    'roast-beef.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/5ylWnm4rF1o" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Seatbelt' => array(
                'category' => 'grab',
                'description' => "La main avant doit attraper l'arrière de la planche. Le mouvement est similaire à un bouclage de ceinture.",
                'images' => array(
                    'seatbelt.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/4vGEOYNGi_c" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Slob' => array(
                'category' => 'grab',
                'description' => "La main avant attrape le côté orteille entre les attaches, pendant que une rotation avant.",
                'images' => array(
                    'slob.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/IGy2hEIIKs0" frameborder="0" allowfullscreen></iframe>',
                )
            ), 'Stalefish' => array(
                'category' => 'grab',
                'description' => "La main arrière atteint le la planche côté talon entre les attaches.",
                'images' => array(
                    'stalefish.jpg',
                ),
                'videos' => array(
                    '<iframe width="560" height="315" src="https://www.youtube.com/embed/f9FjhCt_w2U" frameborder="0" allowfullscreen></iframe>',
                )
            ),
        );

        foreach ($tricks as $name => $fields) {
            $trick = new Trick();
            $trick->setName($name);
            $trick->setDescription($fields['description']);
            $trick->setCategory($categories[$fields['category']]);

            foreach ($fields['videos'] as $videoTag) {
                $video = new Video();
                $video->setTag($videoTag);
                $trick->addVideo($video);
            }

            foreach ($fields['images'] as $imageName) {
                $tempImageName = 'temp-'.$imageName;

                $imageFolder ='app/init/img/';

                copy($imageFolder.$imageName, $imageFolder.$tempImageName);

                $image = new Image();
                $image->setFile(new File($imageFolder.$tempImageName));
                $trick->addImage($image);
            }

            $manager->persist($trick);
        }

        $manager->flush();
        */
    }
}
