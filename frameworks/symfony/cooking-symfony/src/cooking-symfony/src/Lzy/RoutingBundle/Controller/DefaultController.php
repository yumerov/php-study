<?php

namespace Lzy\RoutingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

  public function indexAction() {
    return $this->render('LzyRoutingBundle:Default:index.html.twig');
  }

  public function httpsAction() {
    return new Response("secure response");
  }

}
