<?php

namespace Lzy\FormDummyBundle\Controller;

use Lzy\FormDummyBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller{

  public function newAction(Request $request) {
    $task = new Task();
    $task->setTask("change the world")->setDueDate(new \DateTime('tomorrow'));
    
    $form = $this->createFormBuilder($task)
      ->add('task', TextType::class)
      ->add('dueDate', DateType::class)
      ->add('save', SubmitType::class, ['label' => 'Create task'])
      ->getForm()
    ;
    
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
}
