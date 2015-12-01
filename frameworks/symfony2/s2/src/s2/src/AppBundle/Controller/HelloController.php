<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController extends Controller
{
    /**
     * @Route("/hello/world")
     */
    public function numberAction()
    {
        return new Response('Hello world!');
    }
    
    
    /**
     * @Route("/hello/json")
     */
    public function jsonAction()
    {
        return new JsonResponse(array('hello' => 'world!'));
    }
}