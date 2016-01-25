<?php

namespace Lzy\CmsCoreBundle\Repository;

interface ComponentRepositoryInterface {

  /**
   * @param string $slug
   * @return ComponentInterface|NULL
   */
  public function findOneBySlug($slug);
}
