<?php

abstract class MailManager {

  /**
   *  @var \Mailer
   */
  protected $mailer;

  public function __construct() {
    echo __METHOD__ . "\n";
  }

  public function setMailer(\Mailer $mailer) {
    echo __METHOD__ . "\n";
    $this->mailer = $mailer;
  }

}
