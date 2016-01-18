<?php

namespace Lzy\CmsBundle\Tests\Entity;

use Lzy\CmsBundle\Exception\EntityNotFoundException;

class EntityTest extends EntityTestBase {

  protected static $truncateTables = ["`entity`"];

  /**
   *
   * @var Lzy\CmsBundle\Service\EntityFactory
   */
  protected static $entityFactory;

  /**
   *
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  protected static $entityManager;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$entityFactory = self::$container->get('entity.factory');
    self::$entityManager = self::$container->get('doctrine.orm.entity_manager');
  }

  /**
   * @before
   */
  public function beforeEachTest() {
    self::truncateTables(self::$truncateTables);
  }

  protected function persistEntity($entity) {
    self::$entityManager->persist($entity);
    self::$entityManager->flush();
  }

  public function testCreate() {
    $rawSlug = '  hello, world!';
    $rawType = 'page';
    $entity = self::$entityFactory->create($rawSlug, $rawType);

    $this->persistEntity($entity);

    $expectedSlug = 'hello-world';
    $expectedType = 'page';
    $foundEntity = self::$entityManager
      ->getRepository("LzyCmsBundle:Entity")
      ->findBySlug($expectedSlug);

    if (!$foundEntity) {
      throw new EntityNotFoundException("No entity found with slug \"{$expectedSlug}\"");
    }

    $this->assertEquals($rawType, $expectedType);
  }

  /**
   * @expectedException \Lzy\CmsBundle\Exception\EntityNotFoundException
   * @expectedExceptionMessage No entity found with slug "hello--world".
   */
  public function testFail() {
    $rawSlug = 'hello--world';
    $rawType = 'page';
    $entity = self::$entityFactory->create($rawSlug, $rawType);

    $this->persistEntity($entity);

    $expectedSlug = 'hello--world';
    $expectedType = 'page';
    $foundEntity = self::$entityManager
      ->getRepository("LzyCmsBundle:Entity")
      ->findBySlug($expectedSlug);

    if (!$foundEntity) {
      throw new EntityNotFoundException("No entity found with slug \"{$expectedSlug}\".");
    }

    $this->assertEquals($rawType, $expectedType);
  }

}
