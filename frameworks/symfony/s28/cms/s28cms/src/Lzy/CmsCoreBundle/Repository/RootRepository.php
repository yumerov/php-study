<?php

namespace Lzy\CmsCoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Lzy\CmsCoreBundle\Exception\RootNotFoundException;
use Lzy\CmsCoreBundle\Repository\ComponentRepositoryInterface;

class RootRepository extends EntityRepository implements ComponentRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  public function findOneBySlug($slug) {
    $root = parent::findOneBySlug($slug);

    if (!$root) {
      $message = "Cannot find root with slug \"{$slug}\".";
      throw new RootNotFoundException($message);
    }
    return $root;
  }

}
