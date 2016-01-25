<?php

namespace Lzy\CmsCoreBundle\Tests\Factory;

use Lzy\CmsCoreBundle\Entity\Page;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Factory\RootFactory;
use Lzy\CmsCoreBundle\Tests\TestBase;
use Lzy\CmsCoreBundle\Entity\Category;

class RootFactoryTest extends TestBase {

  /**
   * @var RootFactory
   */
  private static $rootFactory;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$rootFactory = self::$container->get(RootFactory::NAME);
  }

  /**
   * @param string $slug
   * @param string $type
   * @dataProvider failProvider
   * @expectedException \InvalidArgumentException
   */
  public function testFail($slug, $type) {
    self::$rootFactory->create($slug, $type);
  }
  
  /**
   * @param string $slug
   * @param string $type
   * @param string $expectedSlug
   * @dataProvider successProvider
   */
  public function testSuccess($slug, $type, $expectedSlug) {
    $root = self::$rootFactory->create($slug, $type);
    
    $this->assertSame(get_class(new Root()), get_class($root));
    $this->assertSame($root->getSlug(), $expectedSlug);
    
  }

  /**
   * @return Array array of test data
   */
  public function failProvider() {
    return [
      'null title and type' => [NULL, NULL],
      'blank title and type' => ['', ''],
      'white space slug' => ['    ', Page::TYPE],
      'number as title and blank type' => [13, '']
    ];
  }
  
  /**
   * @return Array
   */
  public function successProvider() {
    return [
      ['  hello world', Page::TYPE, 'hello-world'],
      ['foo___bar', Category::TYPE, 'foo-bar'],
    ];
  }

}
