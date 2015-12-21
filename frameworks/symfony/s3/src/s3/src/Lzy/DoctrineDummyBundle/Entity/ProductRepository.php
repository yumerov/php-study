<?php

namespace Lzy\DoctrineDummyBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {
  
  /** 
   * @return array
   */
  public function findAllOrderedByPrice()
  {
    $em = $this->getEntityManager();
    $query = $em->createQuery(
        'SELECT p FROM AppBundle:Product p ORDER BY p.rice ASC');
    $result = $query->getResult();
    
    return $result;
  }
}
