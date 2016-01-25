<?php

namespace Lzy\CmsCoreBundle\Tests\Manager;

use Lzy\CmsCoreBundle\Entity\Page;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Manager\RootManager;
use Lzy\CmsCoreBundle\Tests\Manager\ManagerTestBase;

class RootManagerTest extends ManagerTestBase {

  /** @var Array */
  protected static $truncateTables = ["`core_roots`"];

  /** @var RootManager */
  protected static $rootManager;

  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
    self::$rootManager = self::$container->get(RootManager::NAME);
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
  }

  /**
   * @dataProvider saveFailProvider
   * @param string $slug
   * @param string $type
   * @expectedException \InvalidArgumentException
   */
  public function testSaveFail($slug, $type) {
    $root = new Root();
    $root->setSlug($slug);
    $root->setType($type);

    $isSaved = self::$rootManager->save($root);
    $this->assertTrue($isSaved);
  }

  /**
   * @dataProvider saveSuccessProvider
   * @param string $slug
   * @param string $type
   */
  public function testSaveSuccess($slug, $type) {
    $root = new Root();
    $root->setSlug($slug);
    $root->setType($type);

    $isSaved = self::$rootManager->save($root);
    $this->assertTrue($isSaved);
  }

  /**
   * @return Array
   */
  public function saveFailProvider() {
    return [
      'null slug and title' => [NULL, NULL],
      'blank slug and title' => ['', ''],
      'white space slug and title' => ['     ', '     '],
      'valid slug and white space type' => ['valid', '    '],
    ];
  }
  
  /**
   * @return Array
   */
  public function saveSuccessProvider() {
    return [
      ['valid', Page::TYPE],
      ['white   spaces', Page::TYPE]
    ];
  }

}
