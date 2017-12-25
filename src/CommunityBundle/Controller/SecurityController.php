<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CommunityBundle\Form\LoginForm;
use CommunityBundle\Form\RestoreForm;
use CommunityBundle\Entity\User;
use Utils\PasswordGenerator;

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
     * @Route("/login/restore", name="security_restore")
     */
     public function restoreAction(Request $request, \Swift_Mailer $mailer)
     {
         $form = $this->createForm(RestoreForm::class);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $username = $form->get('email')->getData();
             $em = $this->getDoctrine()->getManager();
             $user = $em->getRepository(User::class)
                ->loadUserByUsername($username);

             $password = PasswordGenerator::generate();
             $user->setPlainPassword($password);

             $em->persist($user);
             $em->flush();

             $message = \Swift_Message::newInstance()
                 ->setSubject('Ton nouveau mot de passe')
                 ->setFrom($this->getParameter('mailer_user'))
                 ->setTo('nabil.lemenuel@gmx.fr')
                 ->setBody(
                     $this->renderView(
                         'emails/new_password.txt.twig',
                         array(
                             'name' => $user->getUsername(),
                             'password' => $password
                         )
                    ),
                    'text/plain'
                )
             ;
             $mailer->send($message);

             $this->addFlash(
                 'sent',
                 'Un e-mail avec ton nouveau mot de passe t\'a été envoyé.'
             );

             return $this->redirectToRoute('security_restore');
         }

         return $this->render('community/restore.html.twig', array(
             'form' => $form->createView()
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
