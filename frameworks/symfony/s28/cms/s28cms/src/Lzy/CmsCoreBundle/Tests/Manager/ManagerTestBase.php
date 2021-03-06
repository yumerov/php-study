<?php

namespace Lzy\CmsCoreBundle\Tests\Manager;

use Lzy\CmsCoreBundle\Tests\TestBase;

class ManagerTestBase extends TestBase {

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

  public function beforeEachTest() {
    self::truncateTables(static::$truncateTables);
  }

  public static function tearDownAfterClass() {
    self::truncateTables(static::$truncateTables);
  }

}
