<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'Mailer.php';
require PATH_PREFIX . 'NewsletterManager.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

$container = new ContainerBuilder();
$container->setParameter('mailer.transport', 'sendmail');

$container
  ->register('mailer', 'Mailer')
  ->addArgument('%mailer.transport%');

$container
  ->register('newsletter_manager', 'NewsletterManager')
  ->addMethodCall('setMailer', [new Reference('mailer')]);

/** @var NewsletterManager */
$newsletterManager = $container->get('newsletter_manager');
$newsletterManager->sendWeeklyEmails();
