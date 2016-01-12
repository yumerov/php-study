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
  
  public function getAction() {
    return new Response("only \"GET\" method allowed");
  }

  
  public function putAction() {
    return new Response("only \"PUT\" method allowed");
  }
  
  
  public function deleteAction() {
    return new Response("only \"DELETE\" method allowed");
  }
}
