<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RoutingController extends Controller
{

  public function indexAction()
  {
    return new Response('hello world!');
  }

  public function paramAction($page)
  {
    return new Response("page: $page");
  }

  public function getAction()
  {
    return new Response('hello world!');
  }
}