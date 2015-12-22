<?php

namespace Lzy\FormDummyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType {
  
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('task', TextType::class)
      ->add('dueDate', DateType::class)
      ->add('save', SubmitType::class)
    ;
  }
}
