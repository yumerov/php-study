<?php

namespace Lzy\FormDummyBundle\Controller;

use Lzy\FormDummyBundle\Entity\Task;
use Lzy\FormDummyBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeController extends Controller{
  
  public function newAction(Request $request) {
    $task = new Task();
    $form = $this->createForm(TaskType::class, $task);
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
}
