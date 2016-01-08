<?php

namespace Lzy\ConsoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyConsoleBundle:Default:index.html.twig');
    }
}
