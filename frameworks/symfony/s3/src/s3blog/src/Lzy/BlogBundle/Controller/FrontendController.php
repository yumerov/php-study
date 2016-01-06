<?php

namespace Lzy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller {

  /**
   * @todo add logic if posts are missing, to render 404 page
   */
  public function indexAction($page = 1) {
    /** @var Lzy\BlogBundle\Service */
    $service = $this->get('blog.data');
    $response = $this->forward('LzyBlogBundle:Frontend:error404');

    try {
      /** @var Array */
      $data = $service->getPostListData((int) $page);

      if ($data['posts']) {
        $template = 'LzyBlogBundle:Frontend:index.html.twig';
        $response = $this->render($template, $data);
      }
    } catch (\Exception $ex) {
      // do nothing, the error response is set by default
    }


    return $response;
  }

  public function postAction($id) {
    /** @var Lzy\BlogBundle\Service */
    $service = $this->get('blog.data');
    /** @var Array */
    $data = $service->getPostViewData($id);

    if ($data['post']) {
      $template = 'LzyBlogBundle:Frontend:view_post.html.twig';
      $response = $this->render($template, $data);
    } else {
      $response = $this->forward('LzyBlogBundle:Frontend:error404');
    }

    return $response;
  }

  public function error404Action() {
    /** @var Lzy\BlogBundle\Service */
    $service = $this->get('blog.data');

    $template = 'LzyBlogBundle:Frontend:404.html.twig';
    $data = $service->getError404Data();

    return $this->render($template, $data);
  }

  public function categoryAction($id) {
    /** @var Lzy\BlogBundle\Service */
    $service = $this->get('blog.data');
    
    /** @var Array */
    $data = $service->getCategoryViewData($id);

    if ($data['category']) {
      $template = 'LzyBlogBundle:Frontend:category.html.twig';
      $response = $this->render($template, $data);
    } else {
      $response = $this->forward('LzyBlogBundle:Frontend:error404');
    }

    return $response;
  }

}
