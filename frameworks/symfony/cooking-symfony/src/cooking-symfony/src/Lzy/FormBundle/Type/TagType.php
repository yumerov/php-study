<?php

namespace Lzy\FormBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType {

  const DATA_CLASS = 'Lzy\FormBundle\Entity\Tag';

  private static $defaults = [
    'data_class' => self::DATA_CLASS
  ];

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('name');
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults(self::$defaults);
  }

}
