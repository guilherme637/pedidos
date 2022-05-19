<?php

namespace App;

use App\Infrastructure\Exception\ValidatorException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ValidatorSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            ExceptionEvent::class => 'validateResponse'
        ];
    }

    public function validateResponse(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof ValidatorException) {
            $response = new JsonResponse($exception->getMessage(), 400);
            $event->setResponse($response);
        }
    }
}