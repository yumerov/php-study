<?php

namespace Lzy\CmsBundle\Tests\Entity;

class EntityTest extends \PHPUnit_Framework_TestCase {

  /**
   * @var Symfony\Component\DependencyInjection\ContainerInterface
   */
  protected static $container;

  /**
   * @param array $tableNames Name of the tables which will be truncated.
   * @param bool $cascade 
   * @return void
   */
  private static function truncateTables($tableNames = array(), $cascade = false) {
    $connection = self::$container->get('doctrine.orm.entity_manager')->getConnection();
    $platform = $connection->getDatabasePlatform();
    $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 0;');
    foreach ($tableNames as $name) {
      $connection->executeUpdate($platform->getTruncateTableSQL($name, $cascade));
    }
    $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
  }

  public static function setUpBeforeClass() {
    $kernel = new \AppKernel("test", true);
    $kernel->boot();

    self::$container = $kernel->getContainer();
    self::truncateTables(["`entity`"]);
  }

  public function testCreate() {
    $entity = new \Lzy\CmsBundle\Entity\Entity();
    $entity->setSlug("hello_1")->setType("page_1");

    $entityManager = self::$container->get('doctrine.orm.entity_manager');
    $entityManager->persist($entity);
    $entityManager->flush();
  }

}
