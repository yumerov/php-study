<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository {
  
  public function findOneByIdAndPagination($id, $page, $perPage) {
    
  }
}
