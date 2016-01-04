<?php

namespace Lzy\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
  /**
   * @todo add logic if posts are missing, to render 404 page
   */
  public function indexAction($page = 0)
  {
    define('PER_PAGE', 2);
    /** @var Lzy\BlogBundle\Entity\PostRepository */
    $repository = $this->getDoctrine()->getRepository('LzyBlogBundle:Post');
    $data = [
      'blog' => [
        'title' => 'Lzy s3 blog',
        'description' => 'lorem ipsum description',
        'author' => 'lzy',
        'date_format' => 'F d, Y',
      ],
      'posts' => $repository->getPostsByPage(PER_PAGE, (int)$page),
      'has_before' => $repository->hasPostsBeforePage(PER_PAGE, (int)$page),
      'has_after' => $repository->hasPostsAfterPage(PER_PAGE, (int)$page),
    ];
    
    return $this->render('LzyBlogBundle:Frontend:index.html.twig', $data);
  }
}