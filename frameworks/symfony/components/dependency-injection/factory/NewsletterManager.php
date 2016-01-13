<?php

class NewsletterManager {

  private $mailer;

  public function __construct() {
    echo __METHOD__ . "\n";
  }

  public function setMailer(\Mailer $mailer) {
    echo __METHOD__ . "\n";
    $this->mailer = $mailer;
  }

  public function sendWeeklyEmails() {
    echo __METHOD__ . "\n";
  }
}
