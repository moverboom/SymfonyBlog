<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 19-4-16
 * Time: 17:33
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction() {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboardAction() {
        $this->denyAccessUnlessGranted('ROLE_USER');
                     
        $posts = [];
        
        for($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->setTitle("Post {$i}");
            $post->setContent("Test content for Post {$i}");
            $posts[] = $post;
        }
        
        return $this->render('default/dashboard.html.twig', array(
            'posts' => $posts
        ));
    }
}