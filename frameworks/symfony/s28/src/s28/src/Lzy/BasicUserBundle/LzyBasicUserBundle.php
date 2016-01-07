<?php

namespace Lzy\BasicUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LzyBasicUserBundle extends Bundle
{
  public function getParent() {
    return 'FOSUserBundle';
  }
}
