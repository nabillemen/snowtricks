<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use SnowTricksBundle\Entity\Trick;
use SnowTricksBundle\Form\TrickType;

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

        if (!$tricks->getIterator()->count()) {
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
    public function deleteAction(Trick $trick, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createFormBuilder()->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($trick);
            $em->flush();

            $this->addFlash(
                'notice',
                'La figure '.$trick->getName().' a bien été supprimée'
            );

            return $this->redirect($this->generateUrl('trick_index').'#tricks');
        }

        return $this->render('snowtricks/delete.html.twig', array(
            'trick' => $trick,
            'csrf_token' => $form->createView()
        ));
    }

    /**
     * @Route("/add", name = "trick_add")
     */
    public function addAction()
    {
        $trick = $this->getDoctrine()->getManager()->getRepository('SnowTricksBundle:Trick')->find(134);
        $form = $this->createForm(TrickType::class, $trick);


        return $this->render('snowtricks/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/edit/{slug}", name = "trick_edit")
     */
    public function editAction()
    {
        return $this->render('snowtricks/edit.html.twig');
    }
}
