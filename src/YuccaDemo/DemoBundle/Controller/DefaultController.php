<?php

namespace YuccaDemo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YuccaDemoBundle:Default:index.html.twig');
    }
}
