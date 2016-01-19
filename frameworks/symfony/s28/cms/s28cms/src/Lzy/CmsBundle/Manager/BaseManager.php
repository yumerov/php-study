<?php

namespace Lzy\CmsBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Lzy\CmsBundle\Service\Is;

class BaseManager {

  /**
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * @var \Lzy\CmsBundle\Service\Is
   */
  protected $is;

  public function setEntitiyManager(EntityManagerInterface $manager) {
    $this->entityManager = $manager;
  }

  protected function getEntityManager() {
    if (!$this->entityManager->isOpen()) {
      $this->entityManager = $this->entityManager->create(
        $this->entityManager->getConnection(),
        $this->entityManager->getConfiguration());
    }

    return $this->entityManager;
  }

  public function setIs(Is $is) {
    $this->is = $is;
  }

}
