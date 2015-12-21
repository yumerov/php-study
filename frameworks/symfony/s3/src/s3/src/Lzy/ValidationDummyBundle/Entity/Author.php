<?php

namespace Lzy\ValidationDummyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Author {
  
  /**
   * @Assert\NotBlank()
   * @var string
   */
  public $name;
}
