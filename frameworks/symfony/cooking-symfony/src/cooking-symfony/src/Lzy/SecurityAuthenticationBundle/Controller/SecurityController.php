<?php

namespace Lzy\SecurityAuthenticationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller {

  const LOGIN_TEMPLATE = 'LzySecurityAuthenticationBundle:Security:login.html.twig';
  
  public function loginAction(Request $request) {
    $authenticationUtils = $this->get('security.authentication_utils');
    $error = $authenticationUtils->getLastAuthenticationError();
    $lastUsername = $authenticationUtils->getLastUsername();
    $data = [
      'last_username' => $lastUsername,
      'error' => $error,
    ];
    
    return $this->render(self::LOGIN_TEMPLATE, $data);
  }

  public function loginCheckAction(Request $request) {
    throw new \Exception("Implement login check logic!");
  }

}
