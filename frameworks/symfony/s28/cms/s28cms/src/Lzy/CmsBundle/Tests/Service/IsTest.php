<?php

namespace Lzy\CmsBundle\Tests\Service;

use Lzy\CmsBundle\Tests\TestUsingContainer;

class IsTest extends TestUsingContainer {

  /**
   * @var Lzy\CmsBundle\Service\Is
   */
  private static $is;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$is = self::$container->get('lzy.is');
  }

  public function testCorrect() {
    $string = "String";
    $this->assertTrue(self::$is->string($string, "string"));
  }

  public function testEmptyStringIsString() {
    $string = "";
    $this->assertTrue(self::$is->string($string, "string"));
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'array' must be a string.
   */
  public function testArrayIsString() {
    $array = [];
    $this->assertTrue(self::$is->string($array, 'array'));
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'number' must be a string.
   */
  public function testNumberIsString() {
    $number = 3.14;
    $this->assertTrue(self::$is->string($number, 'number'));
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'empty' cannot be empty or only white spaces.
   */
  public function testEmptryStringisNonEmptyString() {
    $empty = '';
    $this->assertTrue(self::$is->nonEmptyString($empty, 'empty'));
  }

}
