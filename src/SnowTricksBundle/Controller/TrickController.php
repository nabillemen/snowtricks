<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TrickController extends Controller
{
    /**
     * @Route("/{page}", name = "trick_index", requirements = {"page": "\d+"})
     */
    public function indexAction($page = 1)
    {
        $tricks = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('SnowTricksBundle:Trick')
            ->getOrderedList();

        return $this->render('snowtricks/index.html.twig', array(
            'tricks' => $tricks
        ));
    }

    /**
     * @Route("/trick/{slug}", name = "trick_view")
     */
    public function viewAction()
    {
        return $this->render('snowtricks/view.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('snowtricks/delete.html.twig');
    }

    public function addAction()
    {
        return $this->render('snowtricks/add.html.twig');
    }

    public function editAction()
    {
        return $this->render('snowtricks/edit.html.twig');
    }
}
