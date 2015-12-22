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
   * @var \Symfony\Component\Form\FormBuilder
   */
  private function _generateForm()
  {
    $task = new Task();
    $task->setTask("change the world")->setDueDate(new \DateTime('tomorrow'));
    
    $form = $this->createFormBuilder($task)
      ->add('task', TextType::class)
      ->add('dueDate', DateType::class)
      ->add('save', SubmitType::class, ['label' => 'Create task']);
    
    return $form;
  }


  /**
   * @return \Symfony\Component\Form\FormBuilder
   */
  private function _basicForm() {
    $formBuilder = $this->_generateForm();
    $form = $formBuilder->getForm();
    
    return $form;
  }
  
  
  /**
   * @return \Symfony\Component\Form\FormBuilder
   */
  private function _multipleForm() {
    $formBuilder = $this->_generateForm();
    $formBuilder->add("saveAndAdd", SubmitType::class, ['label' => 'Save and Add']);
    $form = $formBuilder->getForm();
    
    return $form;
  }
  
  public function newAction(Request $request) {
    $form = $this->_basicForm();
    
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
  
  
  public function handleAction(Request $request) {
    $form = $this->_basicForm();
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
      return new Response("the form is valid");
    }
    
    return $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);
  }
  
    public function multipleAction(Request $request) {
    $form = $this->_multipleForm();
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {
      /** @var SubmitType */
      $saveAndAddButton = $form->get('saveAndAdd');
      $message = $saveAndAddButton->isClicked()
        ? "show add form"
        : "show edit form";
      $response =  new Response($message);
    } else {
      $response = $this->render(
      "FormDummyBundle:Default:new.html.twig", ['form' => $form->createView()]);    
    }
    
    return $response;
  }
}
