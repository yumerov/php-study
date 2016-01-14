<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'PageEvents.php';

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

$dispatcher = new EventDispatcher();

$dispatcher->addListener(PageEvents::TITLE, function (GenericEvent $event) {
  echo "Generic event subject: " . gettype($event->getSubject()) . "\n";
  $event['some'] = "just modified event data";
});

$dispatcher->addListener(PageEvents::TITLE, function (GenericEvent $event) {
  $event['some'] = strtoupper($event['some']);
});

$dispatcher->addListener(PageEvents::TITLE, function (GenericEvent $event) {
  echo "event[some]: {$event['some']}\n";
});

$dispatcher->addListener(PageEvents::META, function (GenericEvent $event) {
  echo "Generic event subject: " . gettype($event->getSubject()) . "\n";
});

$dispatcher->dispatch(
  PageEvents::TITLE, new GenericEvent("page title", ['some' => 'data']));

$dispatcher->dispatch(
  PageEvents::META, new GenericEvent(["date" => "2016-01-14"], ['some' => 'data']));
