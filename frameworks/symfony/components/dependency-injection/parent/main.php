<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'Mailer.php';
require PATH_PREFIX . 'MailManager.php';
require PATH_PREFIX . 'NewsletterManager.php';
require PATH_PREFIX . 'GreetingCardManager.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('conf.yml');
$container->compile();

/** @var NewsletterManager */
$newsletterManager = $container->get('newsletter_manager');
$newsletterManager->sendWeeklyEmails();

/** @var GreetingCardManager */
$greetingCardManager = $container->get('greeting_card_manager');
$greetingCardManager->sendBirdthdayCards();