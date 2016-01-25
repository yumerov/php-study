<?php

namespace Lzy\CmsCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Lzy\CmsCoreBundle\Repository\RootRepository")
 * @ORM\Table(name="`core_roots`")
 * @ORM\HasLifecycleCallbacks
 */
class Root {

  const NAME = 'LzyCmsCoreBundle:Root';

  /**
   * @ORM\Column(type="integer", name="`ID`")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", name="`slug`", unique=true, length=64)
   * @Assert\NotBlank()
   * @Assert\Type(
   *     type="string",
   *     message="Root slug must be a string. {{ value }} is not a valid {{ type }}."
   * )
   */
  protected $slug;

  /**
   * @ORM\Column(type="string", name="`type`", length=32)
   * @Assert\NotBlank()
   * @Assert\Type(
   *     type="string",
   *     message="Root type must be a string. {{ value }} is not a valid {{ type }}."
   * )
   */
  protected $type;

  /**
   * @var \DateTime $created
   *
   * @ORM\Column(type="datetime", name="`created_at`", nullable=true)
   */
  protected $created_at;

  /**
   * @var \DateTime $updated
   * 
   * @ORM\Column(type="datetime", name="`updated_at`", nullable=true)
   */
  protected $updated_at;

  /**
   * @param string $slug
   * @param string $type
   */
  public function __construct($slug = '', $type = '') {
    $this->slug = $slug;
    $this->type = $type;
  }
  
  /**
   * Gets triggered only on insert
   * 
   * @ORM\PrePersist
   */
  public function onPrePersist() {
    $this->created_at = new \DateTime("now");
  }

  /**
   * Gets triggered every time on update
   * 
   * @ORM\PreUpdate
   */
  public function onPreUpdate() {
    $this->updated_at = new \DateTime("now");
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
   * Set slug
   *
   * @param string $slug
   *
   * @return Entity
   */
  public function setSlug($slug) {
    $this->slug = $slug;

    return $this;
  }

  /**
   * Get slug
   *
   * @return string
   */
  public function getSlug() {
    return $this->slug;
  }

  /**
   * Set createdAt
   *
   * @param \DateTime $createdAt
   *
   * @return Entity
   */
  public function setCreatedAt(\DateTime $createdAt) {
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
   * Set updatedAt
   *
   * @param \DateTime $updatedAt
   *
   * @return Entity
   */
  public function setUpdatedAt(\DateTime $updatedAt) {
    $this->updated_at = $updatedAt;

    return $this;
  }

  /**
   * Get updatedAt
   *
   * @return \DateTime
   */
  public function getUpdatedAt() {
    return $this->updated_at;
  }

  /**
   * Set type
   *
   * @param string $type
   *
   * @return Entity
   */
  public function setType($type) {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return string
   */
  public function getType() {
    return $this->type;
  }

}
