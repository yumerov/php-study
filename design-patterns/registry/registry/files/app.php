<?php

require 'Registry.php';

$animalRegister = new Registry();
$animalRegister->set('panda', 'red');

echo $animalRegister->get('panda') . "\n";

$carRegister = new Registry();
$carRegister->set('panda', 'fiat');

echo $carRegister->get('panda') . "\n";