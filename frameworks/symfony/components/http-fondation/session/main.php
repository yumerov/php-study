<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

// set flash messages
$session->getFlashBag()->add('notice', 'Notice');
$session->getFlashBag()->add('error', 'Error');

foreach ($session->getFlashBag()->all() as $type => $messages) {
  foreach ($messages as $message) {
    echo "<div class=\"flash-{$type}\">type:{$type}; message: {$message}</div>";
  }
}