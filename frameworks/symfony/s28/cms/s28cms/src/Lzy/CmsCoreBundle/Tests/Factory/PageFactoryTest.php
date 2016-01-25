<?php

namespace Lzy\CmsCoreBundle\Tests\Factory;

use Lzy\CmsCoreBundle\Factory\PageFactory;
use Lzy\CmsCoreBundle\Entity\Page;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Tests\TestBase;

class PageFactoryTest extends TestBase {

  /**
   * @var PageFactory
   */
  private static $pageFactory;
  
  /**
   * @var Root
   */
  private static $root;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$pageFactory = self::$container->get(PageFactory::NAME);
    self::$root = new Root('dummy-root', Page::TYPE);
  }

  /**
   * @param string $title
   * @param string $content
   * @dataProvider successProvider
   */
  public function testSuccess($title, $content) {
    /** @var Page */
    $page = self::$pageFactory->create(self::$root, $title, $content);

    $this->assertSame(get_class(new Page()), get_class($page));
    $this->assertSame($title, $page->getTitle());
    $this->assertSame($content, $page->getContent());
  }


  /**
   * @return Array
   */
  public function successProvider() {
    return [
      'null title and content' => [NULL, NULL],
      'empty title and content' => ['', ''],
      'valid title and content' => ['a title', 'a content'],
    ];
  }

}
