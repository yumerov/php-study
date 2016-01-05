<?php

require 'vendor/autoload.php';
require 'PDOHandler.php';
use \Monolog\Logger;

$logger = new Logger('pdo', [new PDOHandler(new PDO('sqlite:logs.sqlite'))]);

$logger->addAlert('pdo sqlite alert');