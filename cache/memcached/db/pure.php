<?php

require 'general.php';

function doSomething($person) { }

for($i = 0; $i < OPERATION_REPEAT; $i++)
{
  $pdo = getPdo();
  $result = getIdsFromDb($pdo);

  foreach ($result as $person) {
    $currentPerson = getPersonFromDb($person['id'], $pdo);
    doSomething($currentPerson);
  }
}