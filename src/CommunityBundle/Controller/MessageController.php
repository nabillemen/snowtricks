<?php

namespace CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CommunityBundle\Entity\Message;

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

    public function postAction()
    {

    }
}
