<?php

/**
 * Simple factory pattern class
 */
class CarFactory {

  /**
   * Creates Car class instance based on given arguments
   *
   * @return Car description
   */
  public function build ($type, array $options = array()) {
    $className = $type . 'Car';

    if (!class_exists($className)) {
      throw new \Exception('Invalid type of car.');
    }

    return new $className($options);
  }
}