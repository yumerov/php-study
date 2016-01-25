<?php

namespace Lzy\CmsCoreBundle\Repository;

use Lzy\CmsCoreBundle\Entity\ComponentRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class PageRepository extends EntityRepository implements ComponentRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  public function findOneBySlug($slug) {
    
  }

}
