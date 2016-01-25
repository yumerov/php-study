<?php

namespace Lzy\CmsCoreBundle\Tests;

use Symfony\Component\DependencyInjection\ContainerInterface;

class TestBase extends \PHPUnit_Framework_TestCase {

  /**
   *
   * @var ContainerInterface
   */
  protected static $container;
  
  public static function setUpBeforeClass() {
    $kernel = new \AppKernel("test", true);
    $kernel->boot();
    self::$container = $kernel->getContainer();
  }

}
