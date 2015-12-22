<?php

namespace Lzy\ServiceDummyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  public function indexAction()
  {
    /** @var \Lzy\ServiceDummyBundle\Service\Example */
    $example = $this->get('service_dummy.example');
    return new Response($example->hello());
  }
}
