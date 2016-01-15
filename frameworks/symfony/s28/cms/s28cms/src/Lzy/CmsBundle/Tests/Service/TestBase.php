<?php

namespace Lzy\CmsBundle\Tests\Service;

class TestBase extends \PHPUnit_Framework_TestCase {

  /**
   * @var Symfony\Component\DependencyInjection\ContainerInterface
   */
  protected static $container;

  public static function setUpBeforeClass() {
    $kernel = new \AppKernel("test", true);
    $kernel->boot();

    self::$container = $kernel->getContainer();
  }

}
