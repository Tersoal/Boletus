<?php

namespace BoletusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BoletusBundle:Default:index.html.twig', array('name' => $name));
    }
}
