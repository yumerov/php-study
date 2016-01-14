<?php

namespace Lzy\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyCmsBundle:Default:index.html.twig');
    }
}
