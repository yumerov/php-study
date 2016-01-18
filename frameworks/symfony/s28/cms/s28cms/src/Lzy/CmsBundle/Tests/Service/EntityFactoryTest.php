<?php

namespace Lzy\CmsBundle\Tests\Service;

use Lzy\CmsBundle\Entity\Entity;
use Lzy\CmsBundle\Tests\TestUsingContainer;
use Lzy\CmsBundle\Service\EntityFactory;

class EntityFactoryTest extends TestUsingContainer {

  /**
   *
   * @var Lzy\CmsBundle\Service\EntityFactory
   */
  private static $entityFactory;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$entityFactory = self::$container->get(EntityFactory::NAME);
  }

  public function testCorrect() {
    $slug = 'test';
    $type = 'page';
    $entity = self::$entityFactory->create($slug, $type);

    $this->assertInstanceOf(get_class(new Entity()), $entity);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'slug' cannot be empty or only white spaces.
   */
  public function testEmptySlug() {
    $slug = '';
    $type = 'page';

    $entity = self::$entityFactory->create($slug, $type);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'type' cannot be empty or only white spaces.
   */
  public function testEmptyType() {
    $slug = 'slug';
    $type = '';
    $entity = self::$entityFactory->create($slug, $type);
  }

  public function testFull() {
    $slug = '  HELLO - world! ';
    $type = 'page';
    /** @var Lzy\CmsBundle\Entity\Entity */
    $entity = self::$entityFactory->create($slug, $type);
    
    $expectedSlug = 'hello-world';
    $this->assertEquals($expectedSlug, $entity->getSlug());
  }

}
