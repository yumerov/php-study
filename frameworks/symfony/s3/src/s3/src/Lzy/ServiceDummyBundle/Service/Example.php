<?php

namespace Lzy\ServiceDummyBundle\Service;

class Example {
  
  protected $prepend = '';
  
  /** @param string$prepend */
  public function __construct($prepend = '') {
    $this->prepend = $prepend;
  }
  public function hello() {
    return $this->prepend . __METHOD__;
  }
}
