<?php

namespace Lzy\AsseticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    const TEMPLATE_PREFIX = 'LzyAsseticBundle:Default:';

    public function indexAction()
    {
        return $this->render(self::TEMPLATE_PREFIX . 'index.html.twig');
    }

    public function includingJsCssImgAction()
    {
        return $this->render(self::TEMPLATE_PREFIX . 'including_js_css_img.html.twig');
    }

    public function combiningAssetsAction()
    {
        return $this->render(self::TEMPLATE_PREFIX . 'combining_assets.html.twig');
    }

    public function namedAssetsAction()
    {
        return $this->render(self::TEMPLATE_PREFIX . 'named_assets.html.twig');
    }
}
