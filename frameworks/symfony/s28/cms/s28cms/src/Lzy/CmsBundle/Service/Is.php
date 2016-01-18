<?php

namespace Lzy\CmsBundle\Service;

class Is {

  const NAME = 'lzy.is';
  
  /**
   * 
   * @param string$string
   * @param string $name
   * @return boolean
   * @throws \InvalidArgumentException
   */
  public function string($string, $name) {
    if (!is_string($string)) {
      throw new \InvalidArgumentException("The argument '{$name}' must be a string.");
    }

    return true;
  }

  /**
   * 
   * @param string$string
   * @param string $name
   * @return boolean
   * @throws \InvalidArgumentException
   */
  public function nonEmptyString($string, $name) {
    if (!is_string($string)) {
      throw new \InvalidArgumentException(
        "The argument '{$name}' must be a string.");
    }
    
    $trimmedString = trim($string);
    
    if (empty($trimmedString)) {
      throw new \InvalidArgumentException(
        "The argument '{$name}' cannot be empty or only white spaces.");
    }

    return true;
  }

}
