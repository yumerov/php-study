<?php

namespace Lzy\CmsCoreBundle\Tests\Repository;

use Lzy\CmsCoreBundle\Tests\TestBase;
use Lzy\CmsCoreBundle\Entity\RootRepository;
use Lzy\CmsCoreBundle\Entity\Root;

class RepositoryTestBase extends TestBase {

  /**
   * @var \Doctrine\ORM\EntityManager
   */
  protected static $em;

  /** @var RootRepository */
  protected static $rootRepository;

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
      $query = $platform->getTruncateTableSQL($name, $cascade);
      $connection->executeUpdate($query);
    }
    $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
  }

  public static function setUpBeforeClass() {
    parent::setUpBeforeClass();
    self::$em = self::$container->get('doctrine')->getManager();
  }

  public function beforeEachTest() {
    self::truncateTables(static::$truncateTables);
    self::$rootRepository = self::$em->getRepository(Root::NAME);
  }

  public static function tearDownAfterClass() {
    self::truncateTables(static::$truncateTables);
    self::$em->close();
  }

}
