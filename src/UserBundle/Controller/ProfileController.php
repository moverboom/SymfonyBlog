<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 21-4-16
 * Time: 14:16
 */

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/user/profile/{username}", name="user/profile")
     *
     * @param $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction($username) {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getDoctrine()->getManager()->getRepository('AuthenticationBundle:User')->loadUserByUsername($username);

        return $this->render('@User/profile.html.twig',
            array('user' => $user));
    }
}