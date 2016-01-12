<?php

namespace Lzy\FormBundle\Controller;

use Lzy\FormBundle\Entity\Tag;
use Lzy\FormBundle\Entity\Task;
use Lzy\FormBundle\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

  public function indexAction() {
    $task = new Task();
    
    $tag1 = new Tag();
    $tag1->name = 'tag1';
    $task->getTags()->add($tag1);
    
    $tag2 = new Tag();
    $tag2->name = 'tag2';
    $task->getTags()->add($tag2);
    
    $tag3 = new Tag();
    $tag3->name = 'tag3';
    $task->getTags()->add($tag3);
    
    $type = new TaskType();
    
    $data = ['form' => $this->createForm($type, $task)->createView()];
    return $this->render('LzyFormBundle:Default:index.html.twig', $data);
  }

}
