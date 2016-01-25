<?php

namespace Lzy\CmsCoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Exception\RootNotFoundException;
use Lzy\CmsCoreBundle\Repository\ComponentRepositoryInterface;

class RootRepository extends EntityRepository implements ComponentRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  public function findOneBySlug($slug) {
    $em = $this->getEntityManager();
    $root = $em->getRepository(Root::NAME)->findBySlug($slug);
    
    if (!$root) {
      throw new RootNotFoundException("Cannot find root with slug \"{$slug}\"");
    }
    
    return $root;
  }

}
