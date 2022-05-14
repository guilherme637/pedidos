<?php

namespace App;

use App\Exception\ValidatorException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Validator\ConstraintViolation;

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