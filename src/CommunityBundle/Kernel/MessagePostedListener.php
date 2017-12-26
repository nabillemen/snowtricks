<?php

namespace CommunityBundle\Kernel;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MessagePostedListener
{
    public function onMessageInput(FilterResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->attributes->get('isMessagePosted')) {
            $event->setResponse(new RedirectResponse($request->getUri()));
        }
    }
}
