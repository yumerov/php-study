<?php

require 'Car.php';
require 'FamilyCar.php';
require 'LuxuryCar.php';
require 'SportCar.php';
require 'CarFactory.php';

$carFactory = new CarFactory();

echo get_class($carFactory->build('Family')) . "\n";
echo get_class($carFactory->build('Luxury')) . "\n";
echo get_class($carFactory->build('Sport')) . "\n";
echo get_class($carFactory->build('Invalid')) . "\n";

