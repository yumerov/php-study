<?php

require 'Book.php';
require 'BookCollection.php';
require 'BookIterator.php';

$bookCollection = new BookCollection();
$bookCollection->addBook(new Book('Book #1'));
$bookCollection->addBook(new Book('Book #2'));
$bookCollection->addBook(new Book('Book #3'));

foreach ($bookCollection as $book)
{
  var_dump($book);
}

$bookIterator = new BookIterator($bookCollection);

foreach ($bookIterator as $book)
{
  var_dump($book);
}
