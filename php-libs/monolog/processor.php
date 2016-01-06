<?php

require 'vendor/autoload.php';
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

$logger = new Logger('Proccesor');
$handler = new StreamHandler('logs/proccesor.log');
$logger->pushHandler($handler);
$logger->pushProcessor(function ($record) {
    $record['extra']['dummy'] = 'proccesor!';
    return $record;
});

$logger->addInfo('hello world');