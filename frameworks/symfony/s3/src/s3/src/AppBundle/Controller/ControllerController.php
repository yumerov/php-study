<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ControllerController extends Controller
{

  /**
   * @Route("/controller/param")
   */
  public function paramAction(Request $request)
  {
    $page = $request->query->get('page', 1);
    return new Response("<html><body><h1>page: $page</h1></body></html>");
  }
  
  /**
   * @Route("/controller/error")
   */
  public function errorAction()
  {
    throw $this->createNotFoundException("just an error page");
  }

  /**
   * @Route("/controller/flashes")
   */
  public function flashesAction()
  {
    $this->addFlash('notice', 'Just a flash message with ID: ' . rand(1, 100));
    return $this->render('controller/flashes.html.twig');
  }
}