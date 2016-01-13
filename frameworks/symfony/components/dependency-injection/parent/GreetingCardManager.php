<?php

class GreetingCardManager extends MailManager {

  public function sendBirdthdayCards() {
    echo __METHOD__ . "\n";
    $this->mailer->send();
  }

}
