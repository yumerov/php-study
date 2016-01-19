<?php

namespace Lzy\CmsBundle\Tests\Manager;

use Lzy\CmsBundle\Entity\Entity;
use Lzy\CmsBundle\Manager\EntityManager;
use Lzy\CmsBundle\Entity\Page;

class EntityManagerTest extends ManagerTestBase {

  /**
   * @var Array
   */
  protected static $truncateTables = ["`entity`"];

  /**
   * Test data
   * 
   * @var Array
   */
  protected static $testData = [
    'create_successful' => [
      'real' => ['slug' => '  hello, world!', 'type' => Page::TYPE],
      'expected' => ['slug' => 'hello-world', 'type' => Page::TYPE],
    ],
    'create_empty_slug' => ['slug' => '', 'type' => Page::TYPE],
    'create_empty_type' => ['slug' => 'hello-world', 'type' => ''],
    'save_successful' => ['slug' => 'hello world', 'type' => Page::TYPE],
    'find_by_slug_successful' => [
      'real' => ['slug' => 'hello world', 'type' => Page::TYPE],
      'expected' => ['slug' => 'hello-world', 'type' => Page::TYPE],
     ],
  ];

  /**
   * @var \Lzy\CmsBundle\Manager\EntityManager
   */
  protected static $entityManager;

  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
    self::$entityManager = self::$container->get(EntityManager::NAME);
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
  }

  public function testCreateSuccessful() {
    $data = self::$testData['create_successful'];
    $entity = self::$entityManager->create(
      $data['real']['slug'], $data['real']['type']);

    $this->assertInstanceOf(get_class(new Entity), $entity);
    $this->assertEquals($entity->getSlug(), $data['expected']['slug']);
    $this->assertEquals($entity->getType(), $data['expected']['type']);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Entity slug cannot be empty or only white spaces.
   */
  public function testCreateEmptySlug() {
    $data = self::$testData['create_empty_slug'];
    self::$entityManager->create($data['slug'], $data['type']);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage Entity type cannot be empty or only white spaces.
   */
  public function testCreateEmptyType() {
    $data = self::$testData['create_empty_type'];
    self::$entityManager->create($data['slug'], $data['type']);
  }

  public function testSaveSuccessful() {
    $data = self::$testData['save_successful'];
    $entity = self::$entityManager->create($data['slug'], $data['type']);

    $isSaved = self::$entityManager->save($entity);
    $this->assertTrue($isSaved);
  }

  /**
   * @expectedException Doctrine\DBAL\Exception\NotNullConstraintViolationException
   */
  public function testSaveEmptyObject() {
    $isSaved = self::$entityManager->save(new Entity());
    $this->assertTrue($isSaved);
  }

  /**
   * @todo 'Make this test throw an exception for the empty strings.'
   */
  public function testSaveEmptyProverties() {
    $this->markTestSkipped(
      'Make this test throw an exception for the empty strings.');

    $entity = new Entity();
    $entity->setSlug("")->setType("");
    $isSaved = self::$entityManager->save($entity);
    $this->assertTrue($isSaved);
  }
  
  public function testFindBySlugSuccesful() {
    $data = self::$testData['find_by_slug_successful'];
    $entity = self::$entityManager->create(
      $data['real']['slug'], $data['real']['type']);
    self::$entityManager->save($entity);
    
    $foundEntity = self::$entityManager->findOneBySlug($data['expected']['slug']);
    
    $this->assertInstanceOf(get_class(new Entity), $foundEntity);
    $this->assertEquals($foundEntity->getSlug(), $data['expected']['slug']);
    $this->assertEquals($foundEntity->getType(), $data['expected']['type']);
  }

}
