<?php

namespace SnowTricksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use SnowTricksBundle\Entity\Trick;
use SnowTricksBundle\Entity\Category;
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
    public function addAction(Request $request)
    {
        $trick = new Trick();

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($trick);
            $em->flush();

            $this->addFlash(
                'notice',
                'La figure '.$trick->getName().' a bien été ajouté'
            );

            return $this->redirect($this->generateUrl('trick_index').'#tricks');
        }

        return $this->render('snowtricks/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/edit/{slug}", name = "trick_edit")
     * @ParamConverter(
     *      "trick",
     *      options = {
     *          "repository_method" = "findBySlugWithAll"
     *      }
     * )
     */
    public function editAction(Trick $trick, Request $request)
    {
        $videoMaxId = count($trick->getVideos()) - 1;
        $imageMaxId = count($trick->getImages()) - 1;

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($trick);
            $em->flush();

            $this->addFlash(
                'notice',
                'La figure ' . $trick->getName() . ' a bien été modifiée'
            );

            return $this->redirect($this->generateUrl('trick_index') . '#tricks');
        }

        return $this->render('snowtricks/edit.html.twig', array(
            'form' => $form->createView(),
            'video_max_id' => $videoMaxId,
            'image_max_id' => $imageMaxId,
        ));
    }
}
