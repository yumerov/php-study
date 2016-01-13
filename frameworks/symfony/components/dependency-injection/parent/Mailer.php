<?php

class Mailer {

  private $transport;

  public function __construct($transport) {
    $this->transport = $transport;

    echo __METHOD__ . "\n";
  }

  public function send() {
    echo __METHOD__ . "\n";
  }

}
