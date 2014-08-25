<?php

namespace Acme\Bundle\YuccaDemoBundle\Controller;

use Acme\Bundle\YuccaDemoBundle\Entity\User;
use Acme\Bundle\YuccaDemoBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Yucca\Component\Iterator\Iterator;

class UserController extends Controller
{
    public function listAction()
    {
        //Get Users (not sharded)
        $users = new Iterator(
            $this->container->get('yucca.selector_manager')->getSelector('Acme\Bundle\YuccaDemoBundle\Selector\User'),
            $this->container->get('yucca.entity_manager'),
            'Acme\Bundle\YuccaDemoBundle\Entity\User'
        );

        return $this->render('AcmeYuccaDemoBundle:User:list.html.twig', array(
            'users' => $users
        ));
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request, $id)
    {
        if($id) {
            $user = $this->container->get('yucca.entity_manager')->load('Acme\Bundle\YuccaDemoBundle\Entity\User', $id);
        } else {
            $user = new User();
        }

        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->container->get('yucca.entity_manager')->save($user);
            return $this->redirect(
                $this->generateUrl(
                    'acme_yucca_demo_users_list'
                )
            );
        }

        return $this->render('AcmeYuccaDemoBundle:User:form.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function showAction($id)
    {
        //Get User (not sharded)
        $user = $this->container->get('yucca.entity_manager')->load('Acme\Bundle\YuccaDemoBundle\Entity\User', $id);


        //Get Orders (sharded)
        $selector = $this->container->get('yucca.selector_manager')->getSelector('Acme\Bundle\YuccaDemoBundle\Selector\Order');
        $selector->setUserCriteria($user);
        $orders = new Iterator(
            $selector,
            $this->container->get('yucca.entity_manager'),
            'Acme\Bundle\YuccaDemoBundle\Entity\Order'
        );

        return $this->render('AcmeYuccaDemoBundle:User:show.html.twig', array(
            'user' => $user,
            'orders' => $orders,
        ));
    }
}
