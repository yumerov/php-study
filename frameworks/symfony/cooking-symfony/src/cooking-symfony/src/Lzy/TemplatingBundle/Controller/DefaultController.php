<?php

namespace Lzy\TemplatingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyTemplatingBundle:Default:index.html.twig');
    }
    
    public function extensionAction() {
      return $this->render('LzyTemplatingBundle:Default:extension.html.twig');
    }
}
