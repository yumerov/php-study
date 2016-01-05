<?php

namespace Lzy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
  /**
   * @todo add logic if posts are missing, to render 404 page
   */
  public function indexAction($page = 1)
  {    
    /** @var Lzy\BlogBundle\Service */
    $service = $this->get('blog.data');
    /** @var Array */
    $data = $service->getPostListData((int) $page);
    $template = 'LzyBlogBundle:Frontend:index.html.twig';
    return $this->render($template, $data);
  }
  
  public function postAction($id)
  {
    /** @var Lzy\BlogBundle\Entity\PostRepository */
    $repository = $this->getDoctrine()->getRepository('LzyBlogBundle:Post');
    $data = [
      'blog' => [
        'title' => 'Lzy s3 blog',
        'description' => 'lorem ipsum description',
        'author' => 'lzy',
        'date_format' => 'F d, Y',
      ],
      'post' => $repository->findOneById($id),
    ];
    
    return $this->render('LzyBlogBundle:Frontend:view_post.html.twig', $data);
  }
}