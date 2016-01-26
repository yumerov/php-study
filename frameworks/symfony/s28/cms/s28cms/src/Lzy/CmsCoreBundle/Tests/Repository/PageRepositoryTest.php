<?php

namespace Lzy\CmsCoreBundle\Tests\Repository;

use Lzy\CmsCoreBundle\Repository\PageRepository;
use Lzy\CmsCoreBundle\Entity\Page;
use Lzy\CmsCoreBundle\Entity\Root;

class PageRepositoryTest extends RepositoryTestBase {

  /** @var Array */
  protected static $truncateTables = ["`core_roots`", "`core_pages`"];

  /** @var PageRepository */
  private static $pageRepository;

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$pageRepository = self::$em->getRepository(Page::NAME);
  }

  /**
   * @before
   */
  public function beforeEachTest() {
    parent::beforeEachTest();
  }

  public static function tearDownAfterClass() {
    parent::tearDownAfterClass();
  }

  /**
   * @param string $slug
   * @param string $title
   * @param string $content
   * @dataProvider successProvider
   */
  public function testSuccess($slug, $title, $content) {
    $root = new Root($slug, Page::TYPE);
    $page = new Page($root, $title, $content);
    self::$em->persist($page);
    self::$em->flush();

    /** @var Root */
    $foundRoot = self::$rootRepository->findOneBySlug($slug);
    $this->assertSame(get_class($root), get_class($foundRoot));
    $this->assertSame($root->getSlug(), $foundRoot->getSlug());

    /** @var Page */
    $foundPage = self::$pageRepository->findOneBySlug($slug);
    $this->assertSame(get_class($page), get_class($foundPage));
    $this->assertSame($root->getSlug(), $foundPage->getSlug());
    $this->assertSame($root->getType(), $foundPage::TYPE);
    $this->assertSame($page->getTitle(), $foundPage->getTitle());
    $this->assertSame($page->getContent(), $foundPage->getContent());
  }

  /**
   * @param string $slug
   * @dataProvider rootWithoutPageProvider
   * @expectedException \Lzy\CmsCoreBundle\Exception\PageNotFoundException
   */
  public function testRootWithoutPage($slug) {
    $root = new Root($slug, Page::TYPE);
    self::$em->persist($root);
    self::$em->flush();

    self::$pageRepository->findOneBySlug($slug);
  }

  /**
   * @return Array
   */
  public function successProvider() {
    return [
      ['root-1', 'title-1', 'content-1'],
    ];
  }

  /**
   * @return Array
   */
  public function rootWithoutPageProvider() {
    return [
      ['fail'],
    ];
  }

}
