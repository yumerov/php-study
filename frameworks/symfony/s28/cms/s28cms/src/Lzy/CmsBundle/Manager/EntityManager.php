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
  
  /**
   * 
   * @param string $slug
   * @param string $type
   * @throws \InvalidArgumentException
   * @return \Lzy\CmsBundle\Entity\Entity;
   * 
   * @see \Lzy\CmsBundle\Service\EntityFactory
   */
  public function create($slug, $type) {
    return $this->factory->create($slug, $type);
  }

  /**
   * @param \Lzy\CmsBundle\Entity\Entity $entity
   * @return boolean Returns true, if everything is ok
   */
  public function save(Entity $entity) {
    $this->getEntityManager()->persist($entity);
    $this->getEntityManager()->flush();
    return true;
  }

  /**
   * @param string $slug
   * @return \Lzy\CmsBundle\Entity\Entity
   */
  public function findOneBySlug($slug) {
    $this->is->nonEmptyString($slug, 'slug');

    $entity = $this
      ->entityManager
      ->getRepository(Entity::NAME)
      ->findOneBySlug($slug);

    if (!$entity) {
      throw new EntityNotFoundException(
        "No entity found with slug \"{$slug}\".");
    }

    return $entity;
  }

}
