<?php

namespace Lzy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyBlogBundle:Frontend:index.html.twig');
    }
}
