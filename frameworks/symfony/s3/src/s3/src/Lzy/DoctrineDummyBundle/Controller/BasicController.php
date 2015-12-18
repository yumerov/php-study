<?php

namespace Lzy\DoctrineDummyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Lzy\DoctrineDummyBundle\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;

class BasicController extends Controller
{
    /**
     * 
     * @return string
     */
    private function _createProductName() {
        $colors = ['red', 'blue', 'black', 'yellow'];
        $objects = ['car', 'laptop', 'mouse', 'phone'];
        $name = $colors[rand(0, count($colors) - 1)] . ' ' . $objects[rand(0, count($objects) - 1)];
    
        return $name;
    }
    
    private function _createDescription() {
        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
            . " Culpa ex qui unde maiores, omnis laudantium vitae illo asperiores "
            . "hic fugiat distinctio commodi, labore error tenetur architecto "
            . "esse totam possimus impedit?";
    
        return $description;        
    }




    /**
     * 
     * @return Lzy\DoctrineDummyBundle\Entity\Product
     */
    private function _createProduct() {
        $price = rand(1, 99) + 0.99;
        $name = $this->_createProductName();
        $description = $this->_createDescription();
        
        $product = new Product();
        $product
            ->setName($name)
            ->setPrice($price)
            ->setDescription($description)
        ;
        
        return $product;
    }
    
    public function createAction() {
        $product = $this->_createProduct();
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        
        return new Response("new product with id " . $product->getId());
    }
    
    public function viewAction($id) {
        $product = $this->getDoctrine()
            ->getRepository('DoctrineDummyBundle:Product')
            ->find($id);
        
        if ($product instanceof Product)
        {
            $data = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ];
            $status = 200;
        } else {
            $data = ['error' => 'Cannot find product with id "' . $id . '"'];
            $status = 404;
        }
        
        return new JsonResponse($data, $status);
    }
}
