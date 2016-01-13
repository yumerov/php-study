<?php

class NewsletterManager extends MailManager {

  public function sendWeeklyEmails() {
    echo __METHOD__ . "\n";
    $this->mailer->send();
  }

}
