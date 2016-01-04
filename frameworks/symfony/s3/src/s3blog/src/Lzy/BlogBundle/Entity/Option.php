<?php

namespace Lzy\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Option {

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
  protected $key;

  /**
   * @var string
   * @ORM\Column(type="text")
   */
  protected $value;

  /**
   * Get id
   *
   * @return integer
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set key
   *
   * @param string $key
   *
   * @return Option
   */
  public function setKey($key) {
    $this->key = $key;

    return $this;
  }

  /**
   * Get key
   *
   * @return string
   */
  public function getKey() {
    return $this->key;
  }

  /**
   * Set value
   *
   * @param string $value
   *
   * @return Option
   */
  public function setValue($value) {
    $this->value = $value;

    return $this;
  }

  /**
   * Get value
   *
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

}
