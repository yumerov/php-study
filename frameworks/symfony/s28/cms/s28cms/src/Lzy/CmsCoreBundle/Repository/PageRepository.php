<?php

namespace Lzy\CmsCoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Lzy\CmsCoreBundle\Repository\ComponentRepositoryInterface;
use Lzy\CmsCoreBundle\Entity\Root;
use Lzy\CmsCoreBundle\Entity\RootRepository;
use Lzy\CmsCoreBundle\Exception\PageNotFoundException;

class PageRepository extends EntityRepository implements ComponentRepositoryInterface {

  /**
   * {@inheritdoc}
   */
  public function findOneBySlug($slug) {
    /** @var RootRepository */
    $rootRepository = $this->getEntityManager()->getRepository(Root::NAME);
    
    try {
      /** @var Root */
      $root = $rootRepository->findOneBySlug($slug);
    } catch (Exception $ex) {
      $message = "Cannot find page with slug \"{$slug}\" because of missing"
        . " Root component.";
      throw new PageNotFoundException($message, NULL, $ex);
    }
    
    $page = parent::findOneByRoot($root->getId());
    
    if (!$page) {
      throw new PageNotFoundException("Cannot find page with slug \"{$slug}\".");
    }
    
    return $page;
  }

}
