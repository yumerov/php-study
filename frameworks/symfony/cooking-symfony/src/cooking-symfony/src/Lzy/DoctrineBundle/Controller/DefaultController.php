<?php

namespace Lzy\DoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

  public function indexAction() {
    return $this->render('LzyDoctrineBundle:Default:index.html.twig');
  }

}
