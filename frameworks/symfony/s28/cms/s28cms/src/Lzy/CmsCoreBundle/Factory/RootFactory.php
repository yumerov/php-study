<?php

namespace Lzy\CmsCoreBundle\Factory;

use Lzy\CmsCoreBundle\Entity\Root;
use Cocur\Slugify\Slugify;

class RootFactory extends BaseFactory {

  const NAME = 'cms.core.root.factory';

  /**
   *
   * @var \Cocur\Slugify\Slugify
   */
  protected $slugify;

  /**
   * @param Slugify $slugify
   */
  public function setSlugify(Slugify $slugify) {
    $this->slugify = $slugify;
  }

  /**
   * Creates an Root object based on given slug and type
   * 
   * @param string $slug
   * @param string $type
   * @throws \InvalidArgumentException
   * @return \Lzy\CmsCoreBundle\Entity\Root
   */
  public function create($slug, $type) {
    $slugifiedSlug = $this->slugify->slugify(strval($slug));

    $root = new Root();
    $root->setSlug($slugifiedSlug);
    $root->setType($type);
    
    $this->validator->validate($root);

    return $root;
  }

}
