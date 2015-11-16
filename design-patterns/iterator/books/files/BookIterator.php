<?php

/**
 * Book iterator provides low-level control of Book collection
 * 
 * BookColelction replaces using the simple array
 */
class BookIterator implements \Iterator
{
  /**
   * @var integer current position
   */
  private $_position = 0;

  /**
   * @var BookCollection
   */
  private $_booksCollection;

  public function __construct(BookCollection $booksCollection)
  {
    $this->_booksCollection = $booksCollection;
  }

  /**
   * Returns the current element
   * @return Book
   */
  public function current()
  {
    return $this->_booksCollection->getBook($this->_position);
  }

  /**
   * Returns the current position
   * @return integer
   */
  public function key()
  {
    return $this->_position;
  }

  /**
   * Moves teh position to next item
   */
  public function next()
  {
    $this->_position++;
  }

  /**
   * Resets the position
   */
  public function rewind()
  {
    $this->_position = 0;
  }

/**
 * Checks if current item is valud(not null). If is, stops the loop.
 * @return bool
 */
  public function valid()
  {
    return !is_null($this->current());
  }
}