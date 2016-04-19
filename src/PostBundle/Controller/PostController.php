<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 19-4-16
 * Time: 21:41
 */

namespace PostBundle\Controller;

use AppBundle\Entity\Post;
use AuthenticationBundle\Entity\User;
use AuthenticationBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostController extends Controller
{
    /**
     * @Route("post/create", name="post/create")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createPostAction() {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $post = new Post();
        $post->setTitle("Test title");
        $post->setContent("Test Content which is a bit longer");
        $post->setSlug(preg_replace('/[^A-Za-z0-9-]+/', '-', $post->getTitle()));
        $post->setAuthor($this->getUser());
        $post->setCreatedAt(date_create(date('Y-m-d H:i:s')));
        $post->setUpdatedAt(date_create(date('Y-m-d H:i:s')));

        $persistManger = $this->getDoctrine()->getManager();
        $persistManger->persist($post);
        $persistManger->flush();

        return $this->render('@Post/create.html.twig');
    }
}