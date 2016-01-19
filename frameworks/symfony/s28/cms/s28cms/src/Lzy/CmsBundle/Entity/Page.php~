<?php

namespace Lzy\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Lzy\CmsBundle\Entity\Entity;

/**
 * @ORM\Entity(repositoryClass="Lzy\CmsBundle\Entity\PageRepository")
 * @ORM\Table(name="`page`")
 */
class Page implements IEntity {

  const TYPE = 'page';

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
   * @ORM\OneToOne(targetEntity="Entity", cascade={"persist"})
   * @ORM\JoinColumn(name="entity_id", referencedColumnName="ID")
   */
  private $entity;

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
   * Set entity
   *
   * @param \Lzy\CmsBundle\Entity\Entity $entity
   *
   * @return Page
   */
  public function setEntity(Entity $entity) {
    $this->entity = $entity;

    return $this;
  }

  /**
   * Get entity
   *
   * @return \Lzy\CmsBundle\Entity\Entity
   */
  public function getEntity() {
    return $this->entity;
  }

  /**
   * Get id
   *
   * @return integer
   */
  public function getId() {
    return $this->id;
  }

}
