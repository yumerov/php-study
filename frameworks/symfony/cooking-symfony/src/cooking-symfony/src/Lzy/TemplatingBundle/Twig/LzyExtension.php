<?php

namespace Lzy\TemplatingBundle\Twig;

class LzyExtension extends \Twig_Extension {

  const NAME = 'lzy_extension';

  public function getFilters() {
    return [
      new \Twig_SimpleFilter('repeat', [$this, 'repeatFilter']),
    ];
  }

  public function repeatFilter($input, $multiplier = 3) {
    return str_repeat($input, $multiplier);
  }

  public function getName() {
    return self::NAME;
  }

}
