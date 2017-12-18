<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use CommunityBundle\Form\RegisterForm;
use CommunityBundle\Entity\User;
use CommunityBundle\Security\LoginFormAuthenticator;

class UserController extends Controller
{
    /**
     * @Security("!is_granted('ROLE_USER')")
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegisterForm::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->get('security.authentication.guard_handler')
                ->authenticateUserAndHandleSuccess(
                    $user,
                    $request,
                    $this->get(LoginFormAuthenticator::class),
                    'main'
                );
        }

        return $this->render('community/register.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("is_granted('ROLE_USER')")
     * @Route("/profile/edit", name="user_edit")
     */
    public function editAction(Request $request)
    {
        $form = $this->createFormBuilder()->getForm();

        return $this->render('community/edit_profile.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
