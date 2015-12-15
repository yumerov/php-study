<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;

class RoutingController extends Controller
{

  public function indexAction()
  {
    return new Response('hello world!');
  }
}