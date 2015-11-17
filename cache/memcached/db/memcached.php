<?php

require 'general.php';

function doSomething($person) { }

for($i = 0; $i < OPERATION_REPEAT; $i++)
{
  $pdo = getPdo();
  $cache = getMemcached();
  $result = getIds($cache, $pdo);

  foreach ($result as $person) {
    $currentPerson = getPerson($person['id'], $pdo);
    doSomething($currentPerson);
  }
}