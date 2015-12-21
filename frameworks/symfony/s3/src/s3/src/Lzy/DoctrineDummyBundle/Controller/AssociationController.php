<?php

namespace Lzy\DoctrineDummyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lzy\DoctrineDummyBundle\Entity\Category;
use Lzy\DoctrineDummyBundle\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;

class AssociationController extends Controller {
  
  public function createAction() {
    $category = new Category();
    $category->setName("Main category");
    
    $product = new Product();
    $product
      ->setName("Foo")
      ->setPrice(19.99)
      ->setDescription("product for testing entity associations")
      ->setCategory($category)
    ;
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($category);
    $em->persist($product);
    $em->flush();
    
    return new JsonResponse([
      'product_id' => $product->getId(),
      'category_id' => $category->getId()
    ]);
  }
}
