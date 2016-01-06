<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Lzy\BlogBundle\Entity\CategoryRepository")
 */
class Category {

  /**
   * @var integer
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  protected $name;

  /**
   * @var \Doctrine\Common\Collections\ArrayCollection
   * @ORM\OneToMany(targetEntity="Post", mappedBy="category")
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
   * Add post
   *
   * @param \Lzy\BlogBundle\Entity\Post $post
   *
   * @return Category
   */
  public function addPost(\Lzy\BlogBundle\Entity\Post $post) {
    $this->posts[] = $post;

    return $this;
  }

  /**
   * Remove post
   *
   * @param \Lzy\BlogBundle\Entity\Post $post
   */
  public function removePost(\Lzy\BlogBundle\Entity\Post $post) {
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


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
