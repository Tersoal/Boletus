<?php

namespace BoletusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BoletusBundle:Default:index.html.twig');
    }
}
