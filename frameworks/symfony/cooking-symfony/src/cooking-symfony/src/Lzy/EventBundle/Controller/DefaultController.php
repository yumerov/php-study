<?php

namespace Lzy\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyEventBundle:Default:index.html.twig');
    }
}
