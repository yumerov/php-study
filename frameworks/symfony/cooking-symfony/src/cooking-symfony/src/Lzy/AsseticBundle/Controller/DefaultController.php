<?php

namespace Lzy\AsseticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LzyAsseticBundle:Default:index.html.twig');
    }

    public function includingJsCssImgAction()
    {
        return $this->render('LzyAsseticBundle:Default:including_js_css_img.html.twig');
    }

    public function combiningAssetsAction()
    {
        return $this->render('LzyAsseticBundle:Default:combining_assets.html.twig');
    }

    public function namedAssetsAction()
    {
        return $this->render('LzyAsseticBundle:Default:named_assets.html.twig');
    }
}
