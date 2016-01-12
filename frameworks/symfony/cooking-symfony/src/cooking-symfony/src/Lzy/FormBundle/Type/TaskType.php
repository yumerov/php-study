<?php

namespace Lzy\FormBundle\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType {

  const NAME = 'task';

  public function dataPresetListener(FormEvent $event) {
    /** @var TaskType */
    $form = $event->getForm();

    $form->add('save', SubmitType::class);
  }

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('dueDate')
      ->add('priority')
      ->add('task', TextType::class)
      ->add('tags', CollectionType::class, [
        'entry_type' => TagType::class,
        'allow_add' => TRUE,
      ]);

    $builder->addEventListener(
      FormEvents::PRE_SET_DATA, [$this, 'dataPresetListener']);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => 'Lzy\FormBundle\Entity\Task'
    ]);
  }

  public function getName() {
    return self::NAME;
  }

}
