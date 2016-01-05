<?php

require 'vendor/autoload.php';
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

$logger = new Logger('Levels');
$handler = new StreamHandler('logs/levels.log');
$logger->pushHandler($handler);

$logger->addDebug('debug log message', array('key' => 'value'));
$logger->addInfo('info log message');
$logger->addNotice('notice log message');
$logger->addCritical('critical on warning');
