<?php

namespace Lzy\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->forward('lzy_controller.example:nameAction', ['name' => 'Lzy']);
    }
    
    public function nameAction($name) {
      return new Response("<html><body>Hello {$name}!</body></html>");
    }
}
