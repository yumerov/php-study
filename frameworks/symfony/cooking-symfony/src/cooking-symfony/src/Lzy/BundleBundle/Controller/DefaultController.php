<?php

namespace Lzy\BundleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyBundleBundle:Default:index.html.twig');
    }
}
