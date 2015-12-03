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

    
    /**
     * @Route("/hello/repeat/{repeat}")
     */
    public function repeatAction($repeat)
    {
        return new Response(str_repeat("hello world!<br>", $repeat));
    }
    
    /**
     * @Route("/hello/template")
     */
    public function templateAction()
    {
        $html = $this->container->get('templating')->render(
            'hello/tpl.html.twig', ['param' => 'hello world!']);
        
        return new Response($html);
    }
}