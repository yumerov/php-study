<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Post {

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
  protected $title;

  /**
   * @var string
   * @ORM\Column(type="text")
   */
  protected $content;

  /**
   * @var \DateTime
   * @ORM\Column(type="datetime")
   */
  protected $created_at;

  /**
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="posts")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
   */
  protected $category;


  /**
   * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts")
   * @ORM\JoinTable(name="posts_tags")
   */
  protected $tags;

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
   * @return Post
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
   * @return Post
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
   * Set createdAt
   *
   * @param \DateTime $createdAt
   *
   * @return Post
   */
  public function setCreatedAt($createdAt) {
    $this->created_at = $createdAt;

    return $this;
  }

  /**
   * Get createdAt
   *
   * @return \DateTime
   */
  public function getCreatedAt() {
    return $this->created_at;
  }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tag
     *
     * @param \Lzy\BlogBundle\Entity\Tag $tag
     *
     * @return Post
     */
    public function addTag(\Lzy\BlogBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Lzy\BlogBundle\Entity\Tag $tag
     */
    public function removeTag(\Lzy\BlogBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set category
     *
     * @param \Lzy\BlogBundle\Entity\Category $category
     *
     * @return Post
     */
    public function setCategory(\Lzy\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Lzy\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
