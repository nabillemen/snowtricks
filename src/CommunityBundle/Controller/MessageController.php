<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use CommunityBundle\Entity\Message;
use CommunityBundle\Form\MessageType;

class MessageController extends Controller
{
    public function listAction($page)
    {
        $page = (null === $page ? 1 : (int) $page);

        $repository = $this->getDoctrine()
                           ->getManager()
                           ->getRepository(Message::class);
        $amountPerPage = $this->getParameter('community.messages.amount_per_page');

        $messages = $repository->getOrderedList($page, $amountPerPage);

        if ($messages->count() && !$messages->getIterator()->count()) {
            $page = 1;
            $messages = $repository->getOrderedList($page, $amountPerPage);
        }

        return $this->render('community/_message_list.html.twig', array(
            'messages' => $messages,
            'page' => $page
        ));
    }

    /**
     * @Security("is_granted('ROLE_USER')")
     */
    public function postAction(RequestStack $requestStack)
    {
        $masterRequest = $requestStack->getMasterRequest();

        $message = new Message();
        $message->setAuthor($this->getUser());
        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($masterRequest);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($message);
            $em->flush();

            $masterRequest->attributes->set('isMessagePosted', true);
        }

        return $this->render('community/_post_input.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
