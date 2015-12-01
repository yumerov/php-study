<?php

/**
 * Short Description
 *
 * Long Description
 *
 * @package Lzy\DoctorWho\Robots
 * @author Levent Yumerov <yumerov.levent@gmail.com>
 */

namespace Lzy\DoctorWho\Robots;

/**
 * Robot factory class
 * 
 * @see IRobot
 */
class RobotFactory {

  /**
   * Builds robot class name
   * @param  String $name Basic name of the robot
   * @return String Robot's class name
   */
  private function buildRobotName($name) {
    return ucfirst($name) . "Robot";
  }

  /**
   * Builds a robot by given the name
   *
   * @param String $name
   * @return IRobot
   */
  public static function build ($name) {
    
  }
}