<?php

namespace Lzy\CmsBundle\Entity;

use Doctrine\ORM\EntityRepository as ORMEntityRepository;
use Lzy\CmsBundle\Service\Is;

/**
 * PageRepository
 */
class PageRepository extends ORMEntityRepository implements IEntityRepository {

  /**
   * @var Lzy\CmsBundle\Service\Is
   */
  private $_is;

  /**
   * @param Is $is
   */
  public function setIs(Is $is) {
    $this->_is = $is;
  }
  
  public function findBySlug($slug) {
    
    $em = $this->getEntityManager();

    $entity = $em->getRepository("LzyCmsBundle:Entity")->findBySlug($slug);
  }

}
