<?php

/**
 * Dummy class for the example
 */
class Book
{

  /**
   * The book title
   * @var string
   */
  private $_title = '';

  /**
   * @param String $title
   */
  public function __construct ($title)
  {
    $this->_title = $title;
  }
}