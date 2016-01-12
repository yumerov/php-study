<?php

namespace Lzy\FormBundle\Controller;

use Lzy\FormBundle\Entity\Task;
use Lzy\FormBundle\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilder;

class DefaultController extends Controller {

  public function indexAction() {
    $task = new Task();
    $type = new TaskType();
    
    $data = ['form' => $this->createForm($type, $task)->createView()];
    return $this->render('LzyFormBundle:Default:index.html.twig', $data);
  }

}
