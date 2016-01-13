<?php

class NewsletterManager {

  private $mailer;

  public function __construct() {
    echo __METHOD__ . "\n";
  }

  public function setMailer(\Mailer $mailer) {
    $this->mailer = $mailer;
    echo __METHOD__ . "\n";
  }

  public function sendWeeklyEmails() {
    echo __METHOD__ . "\n";
    $this->mailer->send();
  }
}
