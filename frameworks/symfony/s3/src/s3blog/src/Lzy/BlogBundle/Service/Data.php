<?php

namespace Lzy\BlogBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Blog Data service class
 */
class Data {

  /**
   *
   * @var Doctrine\ORM\EntityManager 
   */
  protected $_em;

  /**
   * @param EntityManager $entityManager
   */
  public function __construct(EntityManager $entityManager) {
    $this->_em = $entityManager;
  }

  /**
   * Returns data needed for populating post list page template
   * 
   * @param integer $page
   * @return Array
   */
  public function getPostListData($page) {

    /** @var Lzy\BlogBundle\Entity\OptionRepository */
    $postRepository = $this->_em->getRepository('LzyBlogBundle:Post');

    /** @var Lzy\BlogBundle\Entity\PostRepository; */
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

  /**
   * Returns data needed for populating post view page template
   * 
   * @param integer $id
   * @return Array
   */
  public function getPostViewData($id) {

    /** @var Lzy\BlogBundle\Entity\OptionRepository */
    $postRepository = $this->_em->getRepository('LzyBlogBundle:Post');

    /** @var Lzy\BlogBundle\Entity\PostRepository; */
    $optionRepository = $this->_em->getRepository('LzyBlogBundle:Option');

    $data = [
      'blog' => $optionRepository->getGeneralData(),
      'post' => $postRepository->findOneById($id),
    ];

    return $data;
  }

  /**
   * Returns data needed for populating error 404 page template
   * 
   * @return Array
   */
  public function getError404Data() {

    /** @var Lzy\BlogBundle\Entity\OptionRepository */
    $postRepository = $this->_em->getRepository('LzyBlogBundle:Post');

    /** @var Lzy\BlogBundle\Entity\PostRepository; */
    $optionRepository = $this->_em->getRepository('LzyBlogBundle:Option');

    $data = [
      'blog' => $optionRepository->getGeneralData(),
      'error' => [
        'title' => 'Error 404',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, nostrum nemo sed possimus quas! Nulla quibusdam ad ipsam itaque at labore, est cumque iure, temporibus consequuntur nobis pariatur provident eveniet!',
      ],
    ];

    return $data;
  }

}
