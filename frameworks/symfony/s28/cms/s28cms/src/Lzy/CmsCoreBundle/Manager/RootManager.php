<?php

namespace Lzy\CmsCoreBundle\Manager;

use Cocur\Slugify\Slugify;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Exception\RootNotFoundException;

class RootManager extends BaseManager {

  const NAME = 'cms.core.root.manager';
  
  /** @var Slugify */
  protected $slugify;

  /**
   * @param Slugify $slugify
   */
  public function setSlugify(Slugify $slugify) {
    $this->slugify = $slugify;
  }
  
  /**
   * @param Root $root
   */
  public function fixRoot(Root $root) {
    $fixedRoot = new Root();
    
    $fixedRoot->setSlug($this->slugify->slugify($root->getSlug()));
    $fixedRoot->setType($root->getType());
    $fixedRoot->setType(trim($root->getType()));
    
    return $fixedRoot;
  }
  
  /**
   * @param Root $root
   * @return bool Returns true if everything is ok
   */
  public function save(Root $root) {
    $fixedRoot = $this->fixRoot($root);
    
    $this->validator->validate($fixedRoot);
    
    $this->getEntityManager()->persist($fixedRoot);
    $this->getEntityManager()->flush();
    return true;
  }

  /**
   * @param string $slug
   * @return Root
   */
  public function findOneBySlug($slug) {

    $root = $this
      ->entityManager
      ->getRepository(Root::NAME)
      ->findOneBySlug($slug);

    if (!$root) {
      throw new RootNotFoundException(
      "No root found with slug \"{$slug}\".");
    }

    return $root;
  }

}
