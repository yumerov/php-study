<?php

if (!class_exists('Memcached')) {
  die('This demo requires installed Memcached module.');
}

$cache = new Memcached();
$cache->addServer("localhost", 11211);

function fibonacci($n, $cache) {
  $key = 'fib_' . $n;
  $cachedValue = $cache->get($key);
  if ($cachedValue !== FALSE) {
    $return = $cachedValue;
  } else {
    if ($n < 0) {
      $return = NULL;
    } elseif ($n === 0) {
      $return = 0;
    } elseif ($n === 1 || $n === 2) {
      $return = 1;
    } else {
      $return = fibonacci($n-1, $cache) + fibonacci($n-2, $cache);
    }
  }

  $cache->set($key, $return);

  return $return;
}

echo fibonacci(35, $cache);