<?php

namespace Lzy\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use Lzy\BlogBundle\Entity\OptionRepository;
use Lzy\BlogBundle\Entity\PostRepository;

class Data {

  protected $_em;

  public function __construct(EntityManager $entityManager) {
    $this->_em = $entityManager;
  }

  /**
   * 
   * @return Array
   */
  public function getPostListData($page) {

    /** @var PostRepository */
    $postRepository = $this->_em->getRepository('LzyBlogBundle:Post');

    /** @var OptionRepository */
    $optionRepository = $this->_em->getRepository('LzyBlogBundle:Option');

    $perPage = $optionRepository->getPerPage();

    $data = [
      'blog' => $optionRepository->getGeneralData(),
      'posts' => $postRepository->getPostsByPage((int) $perPage, (int) $page),
      'has_before' => $postRepository->hasPostsBeforePage((int) $perPage, (int) $page),
      'has_after' => $postRepository->hasPostsAfterPage((int) $perPage, (int) $page),
      'page' => $page,
    ];

    return $data;
  }

}
