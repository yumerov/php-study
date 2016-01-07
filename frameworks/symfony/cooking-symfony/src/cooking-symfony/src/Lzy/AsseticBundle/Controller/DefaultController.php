<?php

namespace Lzy\AsseticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyAsseticBundle:Default:index.html.twig');
    }

    public function includingJsCssAction()
    {
        return $this->render('LzyAsseticBundle:Default:including_js_css.html.twig');
    }
}
