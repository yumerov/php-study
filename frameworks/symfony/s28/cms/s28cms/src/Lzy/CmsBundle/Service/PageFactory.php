<?php

namespace Lzy\CmsBundle\Service;

use Lzy\CmsBundle\Entity\Entity;
use \Lzy\CmsBundle\Entity\Page;

class PageFactory extends BaseEntityFactory {

  /**
   * @param \Lzy\CmsBundle\Entity\Entity $parent
   * @param string $title
   * @param string $content
   * @throws \InvalidArgumentException
   * @return Lzy\CmsBundle\Entity\Page
   */
  public function create(Entity $parent, $title, $content) {
    $this->is->string($title, 'title');
    $this->is->string($content, 'content');
    
    $page = new Page();
    $page->setEntity($parent);
    $page->setTitle($title);
    $page->setContent($content);
       
    return $page;
  }

}
