<?php

use Symfony\Component\EventDispatcher\Event;

class AppStartEvent extends Event {

  protected $configuration = [];

  public function __construct(array $configuration = []) {
    $this->configuration = $configuration;
  }
  
  public function setValue($key, $value) {
    $this->configuration[$key] = $value;
  }

  public function getConfiguration() {
    return $this->configuration;
  }

}
