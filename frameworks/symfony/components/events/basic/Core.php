<?php

use Symfony\Component\EventDispatcher\Event;

class Core {

  public function __construct() {
    echo __METHOD__ . "\n";
  }
  
  public function loadConfigurations(AppStartEvent $event) {
    $event->setValue('hello', 'world');
    echo __METHOD__ . "\n";
  }

}
