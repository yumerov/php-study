<?php

class Robot {

  const GREETING = 'Hi';
  
  public function sayHi($times) {
    return self::GREETING . ' ' . str_repeat(self::GREETING . ' ', ($times - 1));
  }

}
