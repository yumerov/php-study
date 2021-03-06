<?php

namespace Lzy\DoctorWho\Companions;

/**
 * Set of methods that must be implemted by doctor who's companions
 */
interface ICompanion {

  /**
   * Travel with teh Doctor
   * @return void
   */
  public function travel();
}