<?php

class Event
{
  static protected $_callbacks = array();

  public static function registerCallback($eventName, $callback)
  {
    if (!is_callable($callback))
    {
      throw new \Exception('Invalid callback!');
    }

    $eventName = strtolower($eventName);
    self::$_callbacks[$eventName][] = $callback;
  }

  public static function trigger($eventName, array $data)
  {
    $eventName = strtolower($eventName);

    if (isset(self::$_callbacks[$eventName]))
    {
      foreach (self::$_callbacks[$eventName] as $callback)
      {
        $callback($data);
      }
    }
  }
}