<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController
{
  /**
  * @Route("/lucky/number")
  */
  public function numberAction()
  {
    $number = rand(0, 100);

    return new Response("<html><body>lucky number: $number</body></html>");
  }

  /**
  * @Route("/lucky/numbers/{count}")
  */
  public function numbersAction($count)
  {

    $numbers = rand(1, 100);

    for ($index = 0; $index < $count; $index++) { 
      $numbers .= ', ' . rand(1, 100);
    }

    return new Response("<html><body>lucky number: $numbers</body></html>");
  }

  /**
   * @Route("/api/lucky/number")
   */
  public function apiNumberAction()
  {
    $data = ['lucky_number' => rand(1, 100)];

    return new JsonResponse($data);
  }
}