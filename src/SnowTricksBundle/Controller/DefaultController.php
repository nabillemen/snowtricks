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
        $trick = new Trick();
        $trick->setName('hlpjgbky');
        $trick->setDescription('heyjeifijeiofjiefjioef');
        $image = new Image();
        $image->setFile(new File($this->container->getParameter('snowtricks.server.image_directory').'40.jpeg'));
        $trick->addImage($image);

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
        $trick->addVideo($video1);
        $trick->addVideo($video2);

        var_dump((string) $this->get('validator')->validate($trick));

        $em = $this->getDoctrine()->getManager();
        $em->persist($trick);
        $em->flush();

        return $this->render('SnowTricksBundle:Default:index.html.twig');
    }
}
