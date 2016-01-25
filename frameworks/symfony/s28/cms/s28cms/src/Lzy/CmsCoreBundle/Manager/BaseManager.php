<?php

namespace Lzy\CmsCoreBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Lzy\CmsCoreBundle\Service\Validator;

class BaseManager {

  /** @var EntityManagerInterface */
  protected $entityManager;
  
  /** @var Validator */
  protected $validator;

  /**
   * @param EntityManagerInterface $manager
   */
  public function setEntityManager(EntityManagerInterface $manager) {
    $this->entityManager = $manager;
  }
  
  /**
   * @param Validator $validator
   */
  public function setValidator(Validator $validator) {
    $this->validator = $validator;
  }

  /**
   * @return EntityManagerInterface
   */
  protected function getEntityManager() {
    if (!$this->entityManager->isOpen()) {
      $this->entityManager = $this->entityManager->create(
        $this->entityManager->getConnection(), $this->entityManager->getConfiguration());
    }

    return $this->entityManager;
  }

}
