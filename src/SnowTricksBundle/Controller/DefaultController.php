<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use SnowTricksBundle\Entity\Category;
use SnowTricksBundle\Entity\Trick;
use SnowTricksBundle\Entity\Image;
use SnowTricksBundle\Entity\Video;


class DefaultController extends Controller
{
    public function indexAction()
    {
        /*
        $trick = new Trick();
        $trick->setName('kefoofeoef');
        $trick->setDescription('ledfkejofjiezfjiezjfi');
        $trick->addImage(new Image());
        $trick->addImage(new Image());
        $trick->addImage(new Image());

        $category =  $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('SnowTricksBundle:Category')
                        ->find(25);
        $trick->setCategory($category);

        $video1 =  $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('SnowTricksBundle:Video')
                        ->find(37);
        $video2 =  $this
                        ->getDoctrine()
                        ->getManager()
                        ->getRepository('SnowTricksBundle:Video')
                        ->find(38);
        $video3 = new Video();
        $video3->setTag('<iframe width="560" height="315" src="https:fkofekU" frameborder="0" allowfullscreen></iframe>');
        $trick->addVideo($video1);
        $trick->addVideo($video2);
        $trick->addVideo($video3);

        var_dump((string) $this->get('validator')->validate($trick));
        */

        $image = new Image();
        $image->setFile(new File($this->container->getParameter('snowtricks.server.image_directory').'29.jpeg'));
        var_dump($image->getFile()->getMimeType());

        var_dump((string) $this->get('validator')->validate($image));

        return $this->render('SnowTricksBundle:Default:index.html.twig');
    }
}
