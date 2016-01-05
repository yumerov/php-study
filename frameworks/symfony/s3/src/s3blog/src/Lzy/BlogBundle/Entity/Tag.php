<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tag {

  /**
   * @var integer
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   * @ORM\Column(type="string", length=128)
   */
  protected $name;

  /**
   * @ORM\ManyToMany(targetEntity="Post", mappedBy="tags")
   */
  protected $posts;

  /**
   * Constructor
   */
  public function __construct() {
    $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
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
   * Set name
   *
   * @param string $name
   *
   * @return Tag
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Add post
   *
   * @param \Lzy\BlogBundle\Entity\Posts $post
   *
   * @return Tag
   */
  public function addPost(\Lzy\BlogBundle\Entity\Posts $post) {
    $this->posts[] = $post;

    return $this;
  }

  /**
   * Remove post
   *
   * @param \Lzy\BlogBundle\Entity\Posts $post
   */
  public function removePost(\Lzy\BlogBundle\Entity\Posts $post) {
    $this->posts->removeElement($post);
  }

  /**
   * Get posts
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getPosts() {
    return $this->posts;
  }

}
