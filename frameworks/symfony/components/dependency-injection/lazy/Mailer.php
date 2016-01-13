<?php

class Mailer {

  /**
   * @var string
   */
  private $transport;

  public function __construct() {
    echo __METHOD__ . "()\n";
  }

  public function send() {
    echo __METHOD__ . "()\n";
  }

  public function setTransport($transport) {
    $this->transport = $transport;
    echo __METHOD__ . "({$transport})\n";
  }

}
