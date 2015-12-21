<?php

namespace Lzy\DoctrineDummyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Lzy\DoctrineDummyBundle\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;

class QueryController extends Controller
{
  public function dqlAction($price)
  {
    $realPrice = (float) $price;
    $queryString =
      'SELECT p FROM DoctrineDummyBundle:Product p WHERE p.price > :price';
    $em = $this->getDoctrine()->getEntityManager();
    $query = $em->createQuery($queryString)->setParameter('price', $realPrice);
    $data = $query->getArrayResult();
    return new JsonResponse($data);
  }
}
