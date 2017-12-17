<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CommunityBundle\Form\LoginForm;

class SecurityController extends Controller
{
    /**
     * @Security("!is_granted('ROLE_USER')")
     * @Route("/login", name="security_login")
     */
    public function loginAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, array(
            '_username' => $lastUsername
        ));

        return $this->render('community/login.html.twig', array(
            'form' => $form->createView(),
            'error'         => $error,
        ));
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('The code here should not be reached.');
    }
}
