<?php

namespace Acme\Bundle\YuccaDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeYuccaDemoBundle:Default:index.html.twig');
    }
}
