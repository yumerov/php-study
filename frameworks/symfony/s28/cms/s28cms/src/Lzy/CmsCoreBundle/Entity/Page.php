<?php

namespace Lzy\CmsCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lzy\CmsCoreBundle\Entity\Root;

/**
 * @ORM\Entity(repositoryClass="Lzy\CmsCoreBundle\Repository\PageRepository")
 * @ORM\Table(name="`core_pages`")
 */
class Page implements ComponentInterface {

  const TYPE = 'page';
  
  const NAME = 'LzyCmsCoreBundle:Page';

  /**
   * @ORM\Column(type="integer", name="`ID`")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", name="`title`", length=128)
   */
  protected $title;

  /**
   * @ORM\Column(type="text", name="`content`")
   */
  protected $content;

  /**
   * @var Root
   * @ORM\OneToOne(targetEntity="Root", cascade={"persist"})
   * @ORM\JoinColumn(name="root_id", referencedColumnName="ID")
   */
  private $root;
  
  /**
   * @param Root $root
   * @param string $title
   * @param string $content
   */
  public function __construct(Root $root = NULL, $title = '', $content = '') {
    $this->root = $root;
    $this->title = $title;
    $this->content = $content;
  }

  /**
   * @return string
   */
  public function getSlug() {
    return $this->root->getSlug();
  }

  /**
   * @return \DateTime
   */
  public function getCreatedAt() {
    return $this->root->getCreatedAt();
  }

  /**
   * @return \DateTime
   */
  public function getUpdatedAt() {
    return $this->root->getUpdatedAt();
  }

  /**
   * Get id
   *
   * @return integer
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set title
   *
   * @param string $title
   *
   * @return Page
   */
  public function setTitle($title) {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Set content
   *
   * @param string $content
   *
   * @return Page
   */
  public function setContent($content) {
    $this->content = $content;

    return $this;
  }

  /**
   * Get content
   *
   * @return string
   */
  public function getContent() {
    return $this->content;
  }

  /**
   * Set root
   *
   * @param \Lzy\CmsCoreBundle\Entity\Root $root
   *
   * @return Page
   */
  public function setRoot(\Lzy\CmsCoreBundle\Entity\Root $root = null) {
    $this->root = $root;

    return $this;
  }

  /**
   * Get root
   *
   * @return \Lzy\CmsCoreBundle\Entity\Root
   */
  public function getRoot() {
    return $this->root;
  }

}
