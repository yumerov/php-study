<?php

class InvokableListener
{
  public function __invoke($data)
  {
    var_dump($data);
  }
}