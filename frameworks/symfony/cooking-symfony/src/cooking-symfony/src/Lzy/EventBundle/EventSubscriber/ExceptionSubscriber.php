<?php

namespace Lzy\EventBundle\EventSubscriber;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionSubscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface {

  public static function getSubscribedEvents() {
    return [
      'kernel.exception' => [
        ['processException', 10],
        ['logException', 0],
        ['notifyException', -10],
      ]
    ];
  }

  public function processException(GetResponseForExceptionEvent $event) {
    // ...
  }

  public function logException(GetResponseForExceptionEvent $event) {
    // ...
  }

  public function notifyException(GetResponseForExceptionEvent $event) {
    // ...
  }

}
