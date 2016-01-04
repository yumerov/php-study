<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
  protected $products;

  /**
   * Constructor
   */
  public function __construct() {
    $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
   * Add product
   *
   * @param \Lzy\BlogBundle\Entity\Post $product
   *
   * @return Category
   */
  public function addProduct(\Lzy\BlogBundle\Entity\Post $product) {
    $this->products[] = $product;

    return $this;
  }

  /**
   * Remove product
   *
   * @param \Lzy\BlogBundle\Entity\Post $product
   */
  public function removeProduct(\Lzy\BlogBundle\Entity\Post $product) {
    $this->products->removeElement($product);
  }

  /**
   * Get products
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getProducts() {
    return $this->products;
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
