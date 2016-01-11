<?php

namespace Lzy\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyControllerBundle:Default:index.html.twig');
    }
}
