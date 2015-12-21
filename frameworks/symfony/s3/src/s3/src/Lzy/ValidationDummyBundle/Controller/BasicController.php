<?php

namespace Lzy\ValidationDummyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Lzy\ValidationDummyBundle\Entity\Author;

class BasicController extends Controller {
  
  public function authorAction() {
    $author = new Author();
    $author->name = "Levent";
    /** @var ValidatorInterface */
    $validator = $this->get('validator');
    $errors = $validator->validate($author);
    
    if (count($errors) > 0)
    {
      return $this->render("ValidationDummyBundle:author:validation.html.twig", ['errors' => $errors]);
    }
    
    return new Response("The author name is valid");
  }
  
  public function choiceAction($gender) {
    
  }
}
