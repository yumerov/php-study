<?php

namespace Lzy\FormBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlagType extends AbstractType {

  private static $defaults = [
    'choices' => [
      'red' => 'Red',
      'yellow' => 'Yellow',
      'green' => 'Green',
    ],
  ];

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(self::$defaults);
  }
  
  public function getParent() {
    return ChoiceType::class;
  }
  
}
