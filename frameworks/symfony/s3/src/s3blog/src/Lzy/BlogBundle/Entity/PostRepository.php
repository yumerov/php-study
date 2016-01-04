<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * @todo refactor!
 */
class PostRepository extends EntityRepository {
  
  protected $getPostsQuery = 'SELECT p ' .
      'FROM LzyBlogBundle:Post p ' .
      'ORDER BY p.created_at DESC';
  
  /**
   * @param integer $count
   * @throws \Exception
   */
  protected function _checkCount($count) {
    if (!is_integer($count)) {
      throw new \Exception("Count must be an integer.");
    }
    
    if ($count < 1) {
      throw new \Exception("Count must be positive.");
    }
  }
  
  /**
   * 
   * @param integer $count
   * @param integer $page
   * @return Array|NULL
   */
  public function getPostsByPage($count, $page) {
    $this->_checkCount($count);
    
    if (!is_integer($page)) {
      throw new \Exception("Page must be an integer.");
    }
    
    if ($page < 0) {
      throw new \Exception("Page must be non-negative.");
    }
    
    $first = $count * $page;
    $limit = $count;
    
    /** @var EntityManager */
    $em = $this->getEntityManager();
    
    $query = $em->createQuery($this->getPostsQuery)
      ->setMaxResults($limit)
      ->setFirstResult($first);
    $result = $query->getResult();
    
    return $result;
  }
  
  /**
   * @todo refactor!
   * @param type $count
   * @param type $page
   * @return boolean
   * @throws \Exception
   */
  public function hasPostsBeforePage($count, $page) {
    $this->_checkCount($count);
    
    if (!is_integer($page)) {
      throw new \Exception("Page must be an integer.");
    }
    
    if ($page === 0) return false;
    
    $first = $count * ($page - 1);
    $limit = $count;
    
    /** @var EntityManager */
    $em = $this->getEntityManager();
    
    $query = $em->createQuery($this->getPostsQuery)
      ->setMaxResults($limit)
      ->setFirstResult($first);
    $result = $query->getResult();
    
    return (is_array($result) && !empty($result));
  }
  
  public function hasPostsAfterPage($count, $page) {
    $this->_checkCount($count);
    
    if (!is_integer($page)) {
      throw new \Exception("Page must be an integer.");
    }
    
    if ($page < 0) {
      throw new \Exception("Page must be non-negative.");
    }
    
    $first = $count * ($page + 1);
    $limit = $count;
    
    /** @var EntityManager */
    $em = $this->getEntityManager();
    
    $query = $em->createQuery($this->getPostsQuery)
      ->setMaxResults($limit)
      ->setFirstResult($first);
    $result = $query->getResult();
    
    return (is_array($result) && !empty($result));
  }
  
}
