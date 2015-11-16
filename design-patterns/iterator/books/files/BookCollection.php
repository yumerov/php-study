<?php

/**
 * The book collection implements IteratorAggregate that not require implementing lov level controls like next, curent, etc
 */
class BookCollection implements \IteratorAggregate
{
  /**
   * @var array
   */
  private $_books = array();

  /**
   * @return BookIterator
   */
  public function getIterator()
  {
    return new BookIterator($this);
  }

  /**
   * @param Book $book
   */
  public function addBook(Book $book)
  {
    $this->_books[] = $book;
  }

  /**
   * @param  integer $index
   * @return Book
   */
  public function getBook($index)
  {
    if (array_key_exists($index, $this->_books))
    {
      return $this->_books[$index];
    }
  }

  /**
   * @return boolean
   */
  public function is_empty()
  {
    return empty($this->_books);
  }
}