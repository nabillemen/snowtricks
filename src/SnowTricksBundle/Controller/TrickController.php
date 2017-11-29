<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use SnowTricksBundle\Entity\Trick;

class TrickController extends Controller
{
    /**
     * @Route(
     *      "/{page}",
     *      name = "trick_index",
     *      requirements = {"page": "\d+(?<!0)"}
     * )
     */
    public function indexAction($page = 1)
    {
        $tricks =  $this->getDoctrine()
                        ->getManager()
                        ->getRepository('SnowTricksBundle:Trick')
                        ->getOrderedList($page, $this->getParameter(
                            'snowtricks.tricks.amount_per_page'
                        ));

        if(!$tricks->getIterator()->count())
        {
            throw $this->createNotFoundException();
        }

        return $this->render('snowtricks/index.html.twig', array(
            'tricks' => $tricks,
            'page' => $page,
        ));
    }

    /**
     * @Route("/trick/{slug}", name = "trick_view")
     * @ParamConverter(
     *      "trick",
     *      options = {
     *          "repository_method" = "findBySlugWithAll"
     *      }
     * )
     */
    public function viewAction(Trick $trick)
    {
        return $this->render('snowtricks/view.html.twig', array(
            'trick' => $trick
        ));
    }

    /**
     * @Route("/delete/{slug}", name = "trick_delete")
     */
    public function deleteAction(Trick $trick)
    {
        return $this->render('snowtricks/delete.html.twig');
    }

    /**
     * @Route("/add", name = "trick_add")
     */
    public function addAction()
    {
        return $this->render('snowtricks/add.html.twig');
    }

    /**
     * @Route("/edit/{slug}", name = "trick_edit")
     */
    public function editAction()
    {
        return $this->render('snowtricks/edit.html.twig');
    }
}
