<?php

namespace Lzy\FormDummyBundle\Controller;

use Lzy\FormDummyBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller{

  /**
   * @return \Symfony\Component\Form\FormBuilder
   */
  private function _generateForm() {
    $task = new Task();
    $task->setTask("change the world")->setDueDate(new \DateTime('tomorrow'));
    
    $form = $this->createFormBuilder($task)
      ->add('task', TextType::class)
      ->add('dueDate', DateType::class)
      ->add('save', SubmitType::class, ['label' => 'Create task'])
      ->getForm()
    ;
    
    return $form;
  }
  
  public function newAction(Request $request) {
    $form = $this->_generateForm();
    
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
  
  
  public function handleAction(Request $request) {
    $form = $this->_generateForm();
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
      return new Response("the form is valid");
    }
    
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
}
