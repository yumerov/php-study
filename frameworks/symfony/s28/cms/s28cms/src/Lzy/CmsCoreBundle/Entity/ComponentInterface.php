<?php

namespace Lzy\CmsCoreBundle\Entity;

interface ComponentInterface {
  public function getSlug();
  public function getCreatedAt();
  public function getUpdatedAt();
}
