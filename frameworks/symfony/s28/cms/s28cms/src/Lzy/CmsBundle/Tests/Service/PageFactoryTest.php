<?php

namespace Lzy\CmsBundle\Tests\Service;

use Lzy\CmsBundle\Entity\Page;
use Lzy\CmsBundle\Tests\TestUsingContainer;
use Lzy\CmsBundle\Service\EntityFactory;
use Lzy\CmsBundle\Service\PageFactory;

class PageFactoryTest extends TestUsingContainer {

  /**
   *
   * @var Lzy\CmsBundle\Service\EntityFactory
   */
  private static $entityFactory;

  /**
   *
   * @var Lzy\CmsBundle\Service\PageFactory
   */
  private static $pageFactory;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$entityFactory = self::$container->get(EntityFactory::NAME);
    self::$pageFactory = self::$container->get(PageFactory::NAME);
  }

  private function createTestEntity() {
    $slug = 'slug_1';
    $type = 'page_1';

    return self::$entityFactory->create($slug, $type);
  }

  public function testCorrect() {
    $parent = $this->createTestEntity();
    $title = 'title';
    $content = 'lorem ipsum content';

    $page = self::$pageFactory->create($parent, $title, $content);
    $this->assertInstanceOf(get_class(new Page()), $page);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'title' must be a string.
   */
  public function testNonStringTitle() {
    $parent = $this->createTestEntity();
    $title = [];
    $content = 'lorem ipsum content';

    $page = self::$pageFactory->create($parent, $title, $content);
    $this->assertInstanceOf(get_class(new Page()), $page);
  }
  
  
  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage The argument 'content' must be a string.
   */
  public function testNonStringContent() {
    $parent = $this->createTestEntity();
    $title = 'title';
    $content = [];

    $page = self::$pageFactory->create($parent, $title, $content);
    $this->assertInstanceOf(get_class(new Page()), $page);
  }

  public function testFull() {
    $parent = $this->createTestEntity();
    $title = 'title';
    $content = 'lorem ipsum content';

    $page = self::$pageFactory->create($parent, $title, $content);
    $this->assertInstanceOf(get_class(new Page()), $page);
    $this->assertEquals($title, $page->getTitle());
    $this->assertEquals($content, $page->getContent());
  }

}
