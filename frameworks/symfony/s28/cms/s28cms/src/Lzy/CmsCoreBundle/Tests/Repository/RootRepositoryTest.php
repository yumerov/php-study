<?php

namespace Lzy\CmsCoreBundle\Tests\Repository;

use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Entity\RootRepository;
use Lzy\CmsCoreBundle\Exception\RootNotFoundException;

class RootRepositoryTest extends RepositoryTestBase {

  /** @var Array */
  protected static $truncateTables = ["`core_roots`"];

  /** @var RootRepository */
  private static $rootRepository;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
  }
  
  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
    self::$rootRepository = self::$em->getRepository(Root::NAME);
  }
  
  public static function tearDownAfterClass() {
    parent::tearDownAfterClass();
  }
  
  /**
   * @param string $slug
   * @dataProvider successProvider
   */
  public function testSuccess($slug) {
    $root = new Root($slug, 'page');
    self::$em->persist($root);
    self::$em->flush();
    
    $foundRoot = self::$rootRepository->findOneBySlug($slug);
    $this->assertSame(get_class($root), get_class($foundRoot));
    $this->assertSame($root->getSlug(), $foundRoot->getSlug());
    $this->assertSame($root->getType(), $foundRoot->getType());
  }
 
  /**
   * @param string $slug
   * @dataProvider failProvider
   * @expectedException \Lzy\CmsCoreBundle\Exception\RootNotFoundException
   */
  public function testFail($slug) {
    self::$rootRepository->findOneBySlug($slug);
  }
  
  /**
   * @return Array
   */
  public function successProvider() {
    return [
      ['success'],
    ];
  }
  
  /**
   * @return Array
   */
  public function failProvider() {
    return [
      ['fail'],
    ];
  }

}
