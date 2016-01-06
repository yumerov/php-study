<?php

require 'vendor/autoload.php';
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

$logger = new Logger('Mail');
$handler = new StreamHandler('logs/mail.log');
$logger->pushHandler($handler);

$logger->addInfo('hello world log');