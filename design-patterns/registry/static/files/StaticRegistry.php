<?php

/**
 * Static Registry exmple class
 */
class StaticRegistry {

  /**
   * @var Array key-value array
   */
  static private $_store = array();

  /**
   * @var Array Array of valid key types
   */
  static private $_validKeyTypes = array('integer', 'string');

  /**
   * Sets the value for given key in registry
   *
   * @param integer|string $key
   * @param object $value
   * @throws \Exception Checks the key type and throws an exception if is not valid
   */
  static public function set($key, $value) {
    if (!in_array(gettype($key), self::$_validKeyTypes)) {
      throw new \Exception('The key is not valid. Can be only a non-negative'
        . 'integer or non-empty string.');
    }

    if (gettype($key) == 'integer' && $key < 0) {
      throw new \Exception('The key cannot be a negative integer.');
    }

    if (gettype($key) == 'string' && strlen(trim($key)) < 0) {
      throw new \Exception('The key cannot be an empty string.');
    }

    self::$_store[$key] = $value;
  }

  /**
   * @param integer|string $key
   * @throws \Exception Throws an exception if there is not a value with given key
   */
  static public function get($key) {
    if (!self::contains($key)) {
      throw new \Exception('Object does not exist in registry');
    }

    return self::$_store[$key];
  }

  /**
   * Checks if teh registry contains a value with given key
   *
   * @return bool
   */
  static public function contains($key) {
    return isset(self::$_store[$key]);
  }

  /**
   * If teh registry contains the value, removes it
   */
  static public function remove($key) {
    if (self::contains($key)) {
      unset(self::$_store[$key]);
    }
  }
}