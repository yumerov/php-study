<?php

namespace Lzy\LoggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

  public function indexAction() {
    /** @var \Psr\Log\LoggerInterface */
    $logger = $this->get('logger');
    
    $logger->info("Just info log");
    $logger->error("errror log, something terrible happened");
    return $this->render('LzyLoggerBundle:Default:index.html.twig');
  }

}
