<?php

namespace Lzy\CmsBundle\Tests\Entity;

use Lzy\CmsBundle\Exception\EntityNotFoundException;
use Lzy\CmsBundle\Entity\Page;

class EntityTest extends EntityTestBase {

  protected static $truncateTables = ["`entity`"];
  
  protected static $testData = [
    'create' => [
      'real' => ['slug' => '  hello, world!', 'type' => Page::TYPE],
      'expected' => ['slug' => 'hello-world', 'type' => Page::TYPE],
    ],
    'fail' => [
      'real' => ['slug' => 'hello--world', 'type' => Page::TYPE],
      'expected' => ['slug' => 'hello--world', 'type' => Page::TYPE],
    ],
  ];

  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
  }

  public function testCreate() {
    $data = self::$testData['create'];
    $entity = self::$entityFactory->create(
      $data['real']['slug'], $data['real']['type']);
    self::$entityManager->save($entity);
    
    $foundEntity = self::$entityManager->findBySlug($data['expected']['slug']);

    if (!$foundEntity) {
      throw new EntityNotFoundException(
        "No entity found with slug \"{$data['expected']['slug']}\"");
    }

    $this->assertEquals($data['real']['type'], $data['expected']['type']);
  }

  /**
   * @expectedException \Lzy\CmsBundle\Exception\EntityNotFoundException
   * @expectedExceptionMessage No entity found with slug "hello--world".
   */
  public function testFail() {
    $data = self::$testData['fail'];
    $entity = self::$entityFactory->create(
      $data['real']['slug'], $data['real']['type']);

    self::$entityManager->save($entity);

    $foundEntity = self::$entityManager->findBySlug($data['expected']['slug']);
  }

}
