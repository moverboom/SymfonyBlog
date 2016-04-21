<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 19-4-16
 * Time: 21:41
 */

namespace PostBundle\Controller;

use PostBundle\Entity\Post;
use PostBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostController extends Controller
{

    /**
     * @Route("post/create", name="post/create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newPostAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $post = new Post();
        $post->setTitle('New Post');

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('save')->isClicked()) {
                $this->storePost($post);
                return $this->redirect('/');
            }
            if($form->get('draft')->isClicked()) {
                return $this->redirect('/dashboard');
            }
        }

        return $this->render('@Post/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    private function storePost(Post $post) {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $post->setSlug(preg_replace('/[^A-Za-z0-9-]+/', '-', $post->getTitle()));
        $post->setAuthor($this->getUser());
        $post->setCreatedAt(date_create(date('Y-m-d H:i:s')));
        $post->setUpdatedAt(date_create(date('Y-m-d H:i:s')));

        $persistManger = $this->getDoctrine()->getManager();
        $persistManger->persist($post);
        $persistManger->flush();
    }
    
}