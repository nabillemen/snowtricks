<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommunityController extends Controller
{
    public function indexAction()
    {
        return $this->render('CommunityBundle:Default:index.html.twig');
    }
}
