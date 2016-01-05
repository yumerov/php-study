<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OptionRepository extends EntityRepository {

  const PER_PAGE = 2;

  public function getBlogTitle() {
    $record = $this->findOneByKey('blog.title');

    if ($record) {
      $title = $record->getValue();
    } else {
      $title = '';
    }

    return $title;
  }

  public function getBlogDescription() {
    $record = $this->findOneByKey('blog.description');

    if ($record) {
      $description = $record->getValue();
    } else {
      $description = '';
    }

    return $description;
  }

  public function getPostsAuthor() {
    $record = $this->findOneByKey('posts.author');

    if ($record) {
      $author = $record->getValue();
    } else {
      $author = '';
    }

    return $author;
  }

  /**
   * 
   * @return integer
   */
  public function getPostsDateFormat() {
    $record = $this->findOneByKey('posts.date_format');

    if ($record) {
      $format = $record->getValue();
    } else {
      $format = "F d, Y";
    }

    return $format;
  }

  /**
   * 
   * @return integer
   */
  public function getPerPage() {
    $record = $this->findOneByKey('posts.per_page');

    if ($record) {
      $perPage = $record->getValue();
    } else {
      $perPage = self::PER_PAGE;
    }

    return $perPage;
  }

  /**
   * 
   * @return Array
   */
  public function getGeneralData() {
    return [
      'title' => $this->getBlogTitle(),
      'description' => $this->getBlogDescription(),
      'author' => $this->getPostsAuthor(),
      'date_format' => $this->getPostsDateFormat(),
      'per_page' => $this->getPerPage(),
    ];
  }

}
