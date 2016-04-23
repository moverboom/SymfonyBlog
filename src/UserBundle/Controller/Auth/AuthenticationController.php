<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 19-4-16
 * Time: 13:32
 */

namespace UserBundle\Controller\Auth;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AuthenticationController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {
        $authenticationUtil = $this->get('security.authentication_utils');

        //Get login error if exists
        $error = $authenticationUtil->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtil->getLastUsername();

        return $this->render(
            '@User/auth/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
    }
}