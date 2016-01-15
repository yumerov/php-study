<?php

namespace Lzy\CmsBundle\Service;

use Cocur\Slugify\Slugify;
use Lzy\CmsBundle\Entity\Entity;
use Lzy\CmsBundle\Entity\Page;

class EntityFactory extends BaseEntityFactory {

  /**
   *
   * @var \Cocur\Slugify\Slugify
   */
  protected $slugify;

  /**
   * @param Slugify $slugify
   */
  public function setSlugify(Slugify $slugify) {
    $this->slugify = $slugify;
  }

  /**
   * Creates an Entity object based on given slug and type
   * 
   * @param string $slug
   * @param string $type
   * @throws \InvalidArgumentException
   * @return \Lzy\CmsBundle\Entity\Entity
   */
  public function create($slug, $type) {
    $this->is->nonEmptyString($slug, 'slug');

    $slugifiedSlug = $this->slugify->slugify($slug);

    $this->is->nonEmptyString($type, 'type');

    $entity = new Entity();
    $entity->setSlug($slugifiedSlug);
    $entity->setType(Page::TYPE);

    return $entity;
  }

}
