<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';

use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Stopwatch\StopwatchEvent;

define('CORE_LOADING', 'core.loading');

$stopwatch = new Stopwatch();
$stopwatch->start(CORE_LOADING);
echo "Started core loading\n";
sleep(rand(1, 5));
$event = $stopwatch->stop(CORE_LOADING);
echo "Stop core loading\n";

/** @var Symfony\Component\Stopwatch\StopwatchEvent */
$event = $stopwatch->getEvent(CORE_LOADING);

echo "Event:\n" .
  "  Category :{$event->getCategory()}\n" .
  "  Origin: {$event->getOrigin()}\n" .
  "  Duration: {$event->getDuration()}\n" .
  "  Memory: {$event->getMemory()}";