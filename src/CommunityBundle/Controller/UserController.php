<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use CommunityBundle\Form\RegisterForm;
use CommunityBundle\Form\EditProfileForm;
use CommunityBundle\Form\ResetPasswordForm;
use CommunityBundle\Entity\User;
use CommunityBundle\Entity\Avatar;
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
        $form = $this->createForm(RegisterForm::class, $user, array(
            'validation_groups' => array('Registration')
        ));

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
        $user = $this->getUser();
        $form = $this->createForm(EditProfileForm::class, $user, array(
            'validation_groups' => array('ProfileEdition', 'Default')
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('trick_index');
        }

        return $this->render('community/edit_profile.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Security("is_granted('ROLE_USER')")
     * @Route("/profile/reset_password", name="user_reset_password")
     */
    public function resetPasswordAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(ResetPasswordForm::class, $user, array(
            'validation_groups' => array('PasswordReset')
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush($user);

            return $this->redirectToRoute('trick_index');
        }

        return $this->render('community/reset_password.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
