<?php

namespace Lzy\NewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NewBundle:Default:index.html.twig');
    }
}
