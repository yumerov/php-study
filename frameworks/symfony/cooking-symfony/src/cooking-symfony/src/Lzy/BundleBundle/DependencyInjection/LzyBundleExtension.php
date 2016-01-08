<?php

namespace Lzy\BundleBundle\DependencyInjection;

use Sensio\Bundle\FrameworkExtraBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class LzyBundleExtension extends Extension {
  
  /**
   * {@inheritdoc}
   * @param array $configs
   * @param \Lzy\BundleBundle\DependencyInjection\ContainerBuilder $container
   */
  public function load(array $configs, ContainerBuilder $container) {
    $fileLocator = new FileLocator(__DIR__ . '/../Resources/config');
    $loader = new YamlFileLoader($container, $fileLocator);
    $loader->load('config.yml');
  }
}
