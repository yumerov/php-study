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
  
  public function builderAction($price)
  {
    $realPrice = (float) $price;
    $repository = $this->getDoctrine()->getRepository('DoctrineDummyBundle:Product');
    $query = $repository
      ->createQueryBuilder('p')
      ->where('p.price > :price')
      ->setParameter('price', $realPrice)
      ->getQuery();
    
    $data = $query->getArrayResult();
    return new JsonResponse($data);
  }
  
  public function customAction() {
    /**
     * @var ProductRepository
     */
    $repository = $this->getDoctrine()->getRepository('DoctrineDummyBundle:Product');
    $query = $repository->findAllOrderedByName();
    return new JsonResponse((array) $data);
  }
}
