<?php

namespace Lzy\CmsBundle\Manager;

use Lzy\CmsBundle\Entity\Entity;
use Lzy\CmsBundle\Service\EntityFactory;
use Lzy\CmsBundle\Exception\EntityNotFoundException;

class EntityManager extends BaseManager {

  const NAME = 'cms.entity.manager';

  /**
   *
   * @var \Lzy\CmsBundle\Service\EntityFactory
   */
  protected $factory;

  public function setFactory(EntityFactory $factory) {
    $this->factory = $factory;
  }

  public function save(Entity $entity) {
    $this->entityManager->persist($entity);
    $this->entityManager->flush();
  }

  /**
   * @param string $slug
   * @return \Lzy\CmsBundle\Entity\Entity
   */
  public function findBySlug($slug) {
    $this->is->nonEmptyString($slug, 'slug');

    $entity = $this->entityManager->getRepository("LzyCmsBundle:Entity")->findBySlug($slug);

    if (!$entity) {
      throw new EntityNotFoundException(
        "No entity found with slug \"{$slug}\".");
    }

    return $entity;
  }

}
