<?php

require 'vendor/autoload.php';
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use \Monolog\Formatter\LineFormatter;

$logger = new Logger('format');
$handler = new StreamHandler('logs/log.csv');
$logger->pushHandler($handler);

$format = "\"%datetime%\",\"%level_name%\",\"%message%\",\"%context%\", \"%extra%\"\n";
$dateFormat = "Y n j, g:i a";
$formatter = new LineFormatter($format, $dateFormat);
$handler->setFormatter($formatter);

$logger->addError("just an error");
$logger->addWarning("warning :)");
$logger->addAlert("red alert 2");