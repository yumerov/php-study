<?php

namespace Lzy\BundleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return new Response("Hello from " . __METHOD__);
    }
    
    public function configAction ()
    {
      return new Response(print_r($this->container->getParameter('lzy_bundle.panda'), TRUE));
    }
}
