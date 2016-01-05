<?php

require 'vendor/autoload.php';
use \Monolog\Logger;
use \Monolog\Handler\SocketHandler;

$logger = new Logger('socket');
$handler = new SocketHandler('unix:///var/log/monolog.socket');
$handler->setPersistent(true);
$logger->pushHandler($handler);

$logger->addCritical('critial vai socket');