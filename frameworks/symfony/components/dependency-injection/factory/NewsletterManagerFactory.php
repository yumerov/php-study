<?php

class NewsletterManagerFactory {
  
  public function __construct() {
    echo __METHOD__ . "\n";
  }

  public static function createNewsletterManager($argument) {
    echo __METHOD__ . "with arguument: {$argument}\n";
    $newsletterManager = new NewsletterManager();
    
    return $newsletterManager;
  }

}
