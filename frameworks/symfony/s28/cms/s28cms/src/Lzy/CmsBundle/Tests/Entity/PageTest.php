<?php

namespace Lzy\CmsBundle\Tests\Entity;

use Lzy\CmsBundle\Entity\Page;
use Lzy\CmsBundle\Service\PageFactory;

class PageTest extends EntityTestBase {

  /**
   *
   * @var Lzy\CmsBundle\Service\PageFactory
   */
  protected static $pageFactory;
  
  /**
   *
   * @var Array
   */
  protected static $testData = [
    'successful_create' => [
      'parent' => ['slug' => 'hello world', 'type' => Page::TYPE],
      'page' => ['title' => 'a title', 'content' => 'lorem ipsum']
    ],
  ];
  
  protected static $truncateTables = ["`entity`", "`page`"];

  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$pageFactory = self::$container->get(PageFactory::NAME);
  }

  public function testSuccessfulCreate() {
//    $realData = self::$testData['successful_create'];
//
//    $parent = self::$entityFactory->create(
//      $realData['parent']['slug'], $realData['parent']['type']);
//
//    $page = self::$pageFactory->create(
//      $parent, $realData['page']['title'], $realData['page']['content']);
//
//    $this->persistEntity($page);
    
    
  }

}
