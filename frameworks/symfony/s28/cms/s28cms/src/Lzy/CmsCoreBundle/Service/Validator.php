<?php

namespace Lzy\CmsCoreBundle\Service;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator {
  
  const NAME = 'cms.core.validator';
  
  /**
   * @var ValidatorInterface
   */
  protected $validator;

  /**
   * @param ValidatorInterface $validator
   * @throws \InvalidArgumentException
   */
  public function setValidator(ValidatorInterface $validator) {
    $this->validator = $validator;
  }
  
  public function validate($value, $constraints = null, $groups = null) {
    $errors = $this->validator->validate($value, $constraints, $groups);
    
    /** @var $error ConstraintViolationInterface */
    foreach ($errors as $error) {
      throw new \InvalidArgumentException($error->__toString());
    }
  }
}
