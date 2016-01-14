<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'AppEvents.php';
require PATH_PREFIX . 'LoadRenderData.php';
require PATH_PREFIX . 'Core.php';
require PATH_PREFIX . 'AppStartEvent.php';

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();

$dispatcher->addListener(AppEvents::APP_START, ['Core', 'loadConfigurations']);
$dispatcher->addListener(AppEvents::APP_RUN, new LoadRenderData());
$dispatcher->addListener(AppEvents::APP_FINISH, function (Event $event) {
  var_dump($event);
});
$dispatcher->addListener(AppEvents::APP_START, function (AppStartEvent $event) {
  $event->setValue('foo', 'bar');
  var_dump($event->getConfiguration());
});

$dispatcher->dispatch(AppEvents::APP_START, new AppStartEvent([]));
$dispatcher->dispatch(AppEvents::APP_RUN);
$dispatcher->dispatch(AppEvents::APP_FINISH);