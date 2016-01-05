<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Option Repository class
 */
class OptionRepository extends EntityRepository {

  /**
   * Default posts per page value
   * 
   * @var integer
   */
  const PER_PAGE = 2;

  /**
   * Posts per page database option key
   * 
   * @var string
   */
  const PER_PAGE_KEY = 'posts.per_page';

  /**
   * Default blog title
   * 
   * @var string
   */
  const BLOG_TITLE = '';

  /**
   * Blog title database option key
   * 
   * @var string
   */
  const BLOG_TITLE_KEY = 'blog.title';

  /**
   * Default blog description
   * 
   * @var string
   */
  const BLOG_DESCRIPTION = '';

  /**
   * Blog description database option key
   * 
   * @var string
   */
  const BLOG_DESCRIPTION_KEY = 'blog.description';

  /**
   * Default posts author
   * 
   * @var string
   */
  const POSTS_AUTHOR = 'lzy';

  /**
   * Posts author database option key
   * 
   * @var string
   */
  const POSTS_AUTHOR_KEY = 'posts.author';

  /**
   * Default date format
   * 
   * @var string
   */
  const DATE_FORMAT = "F d, Y";

  /**
   * Date format databse option key
   * 
   * @var string
   */
  const DATE_FORMAT_KEY = "posts.date_format";

  /**
   * Returns blog title stored in the database or default value
   *
   * @var string
   */
  public function getBlogTitle() {
    $record = $this->findOneByKey(self::BLOG_TITLE_KEY);
    $title = ($record) ? $record->getValue() : self::BLOG_TITLE;
    return $title;
  }

  /**
   * Returns blog description stored in the database or default value
   *
   * @var string
   */
  public function getBlogDescription() {
    $record = $this->findOneByKey(self::BLOG_DESCRIPTION_KEY);
    $description = ($record) ? $record->getValue() : self::BLOG_DESCRIPTION;
    return $description;
  }

  /**
   * Returns posts' author stored in the database or default value
   *
   * @var string
   */
  public function getPostsAuthor() {
    $record = $this->findOneByKey(self::POSTS_AUTHOR_KEY);
    $author = ($record) ? $record->getValue() : self::POSTS_AUTHOR;
    return $author;
  }

  /**
   * Returns posts' date format stored in the database or default value
   * 
   * @return string
   */
  public function getPostsDateFormat() {
    $record = $this->findOneByKey(self::DATE_FORMAT_KEY);
    $format = ($record) ? $record->getValue() : self::DATE_FORMAT;
    return $format;
  }

  /**
   * Returns posts per page stored in the database or default value
   * 
   * @return integer
   */
  public function getPerPage() {
    $record = $this->findOneByKey(self::PER_PAGE_KEY);
    $perPage = ($record) ? $record->getValue() : self::PER_PAGE;
    return $perPage;
  }

  /**
   * Returns general data used in the templates
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
