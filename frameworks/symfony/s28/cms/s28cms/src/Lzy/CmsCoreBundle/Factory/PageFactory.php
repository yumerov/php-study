<?php

namespace Lzy\CmsCoreBundle\Factory;

use Lzy\CmsCoreBundle\Entity\Page;
use Lzy\CmsCoreBundle\Entity\Root;

class PageFactory extends BaseFactory {

  const NAME = 'cms.core.page.factory';

  /**
   * @param Root $root
   * @param string $title
   * @param string $content
   * @return Root
   */
  public function create(Root $root, $title = '', $content = '') {
    $page = new Page();
    $page
      ->setRoot($root)
      ->setTitle($title)
      ->setContent($content);

    $this->validator->validate($page);

    return $page;
  }

}
