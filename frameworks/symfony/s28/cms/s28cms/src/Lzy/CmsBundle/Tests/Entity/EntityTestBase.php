<?php

namespace Lzy\CmsBundle\Tests\Entity;

use Lzy\CmsBundle\Tests\TestUsingContainer;
use Lzy\CmsBundle\Service\EntityFactory;
use Lzy\CmsBundle\Manager\EntityManager;

class EntityTestBase extends TestUsingContainer {

  /**
   * @var \Lzy\CmsBundle\Manager\EntityManager;
   */
  protected static $entityManager;

  /**
   *
   * @var Lzy\CmsBundle\Service\EntityFactory
   */
  protected static $entityFactory;

  /**
   * @param array $tableNames Name of the tables which will be truncated.
   * @param bool $cascade 
   * @return void
   */
  protected static function truncateTables($tableNames = array(), $cascade = false) {
    $connection = self::$container->get('doctrine.orm.entity_manager')->getConnection();
    $platform = $connection->getDatabasePlatform();
    $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 0;');
    foreach ($tableNames as $name) {
      $connection->executeUpdate($platform->getTruncateTableSQL($name, $cascade));
    }
    $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$entityFactory = self::$container->get(EntityFactory::NAME);
    self::$entityManager = self::$container->get(EntityManager::NAME);
  }

  public function beforeEachTest() {
    self::truncateTables(static::$truncateTables);
  }

}
