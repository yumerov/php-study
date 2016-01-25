<?php

namespace Lzy\CmsCoreBundle\Factory;

use Lzy\CmsCoreBundle\Service\Validator;

class BaseFactory {

  /**
   * @var Validator
   */
  protected $validator;

  /**
   * @param Validator $validator
   */
  public function setValidator(Validator $validator) {
    $this->validator = $validator;
  }

}
