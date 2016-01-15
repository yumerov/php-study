<?php

namespace Lzy\CmsBundle\Service;

class BaseEntityFactory {

  /**
   *
   * @var \Lzy\CmsBundle\Service\Is
   */
  protected $is;

  /**
   * @param \Lzy\CmsBundle\Service\Is $is
   */
  public function setIs(Is $is) {
    $this->is = $is;
  }

}
