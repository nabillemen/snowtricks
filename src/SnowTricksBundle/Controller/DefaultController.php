<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SnowTricksBundle:Default:index.html.twig');
    }
}
