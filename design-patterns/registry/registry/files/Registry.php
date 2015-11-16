<?php

/**
 * Registry exmple class
 */
class Registry {

  /**
   * @var Array key-value array
   */
  private $_store = array();

  /**
   * @var Array Array of valid key types
   */
  private $_validKeyTypes = array('integer', 'string');

  /**
   * Sets the value for given key in registry
   *
   * @param integer|string $key
   * @param object $value
   * @throws \Exception Checks the key type and throws an exception if is not valid
   */
  public function set($key, $value) {
    if (!in_array(gettype($key), $this->_validKeyTypes)) {
      throw new \Exception('The key is not valid. Can be only a non-negative'
        . 'integer or non-empty string.');
    }

    if (gettype($key) == 'integer' && $key < 0) {
      throw new \Exception('The key cannot be a negative integer.');
    }

    if (gettype($key) == 'string' && strlen(trim($key)) < 0) {
      throw new \Exception('The key cannot be an empty string.');
    }

    $this->_store[$key] = $value;
  }

  /**
   * @param integer|string $key
   * @throws \Exception Throws an exception if there is not a value with given key
   */
  public function get($key) {
    if (!self::contains($key)) {
      throw new \Exception('Object does not exist in registry');
    }

    return $this->_store[$key];
  }

  /**
   * Checks if teh registry contains a value with given key
   *
   * @return bool
   */
  public function contains($key) {
    return isset($this->_store[$key]);
  }

  /**
   * If teh registry contains the value, removes it
   */
  public function remove($key) {
    if (self::contains($key)) {
      unset($this->_store[$key]);
    }
  }
}