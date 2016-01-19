<?php

namespace Lzy\CmsBundle\Service;

use Cocur\Slugify\Slugify;
use Lzy\CmsBundle\Entity\Entity;
use Lzy\CmsBundle\Entity\Page;

class EntityFactory extends BaseEntityFactory {

  const NAME = 'cms.entity.factory';

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
    try {
      $this->is->nonEmptyString($slug, 'slug');
    } catch (\InvalidArgumentException $ex) {
      throw new \InvalidArgumentException(
      "Entity slug cannot be empty or only white spaces.", NULL, $ex);
    }

    $slugifiedSlug = $this->slugify->slugify($slug);

    try {
      $this->is->nonEmptyString($type, 'type');
    } catch (\InvalidArgumentException $ex) {
      throw new \InvalidArgumentException(
      "Entity type cannot be empty or only white spaces.", NULL, $ex);
    }

    $entity = new Entity();
    $entity->setSlug($slugifiedSlug);
    $entity->setType($type);

    return $entity;
  }

}
