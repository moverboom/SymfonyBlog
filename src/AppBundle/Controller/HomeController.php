<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 19-4-16
 * Time: 17:33
 */

namespace AppBundle\Controller;

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
}