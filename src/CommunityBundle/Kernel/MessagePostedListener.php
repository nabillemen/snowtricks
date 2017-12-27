<?php

namespace CommunityBundle\Kernel;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;
use CommunityBundle\Form\MessageType;
use CommunityBundle\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class MessagePostedListener
{
    private $em;
    private $router;
    private $formFactory;
    private $tokenStorage;
    private $requestStack;

    public function __construct(
        EntityManagerInterface $em,
        RouterInterface $router,
        FormFactoryInterface $formFactory,
        TokenStorageInterface $tokenStorage,
        RequestStack $requestStack
    )
    {
        $this->em = $em;
        $this->router = $router;
        $this->formFactory = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;
    }

    public function onMessageInput(GetResponseEvent $event)
    {
        if ($this->requestStack->getParentRequest()) {
            return;
        }

        $request = $event->getRequest();

        $isMessageInputSubmit = $request->isMethod('POST')
                                && $request->request->get('message')['content'];

        $token = $this->tokenStorage->getToken();
        $user = null === $token ? null : $token->getUser();
        if ($isMessageInputSubmit && is_object($user)) {
            $message = new Message();
            $message->setAuthor($user);
            $form = $this->formFactory->create(MessageType::class, $message);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $this->em->persist($message);
                $this->em->flush();

                $event->setResponse(new RedirectResponse($request->getUri()));
            }
        }
    }
}
