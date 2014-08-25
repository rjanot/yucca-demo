<?php

namespace Acme\Bundle\YuccaDemoBundle\Controller;

use Acme\Bundle\YuccaDemoBundle\Entity\Order;
use Acme\Bundle\YuccaDemoBundle\Entity\User;
use Acme\Bundle\YuccaDemoBundle\Form\Type\OrderType;
use Acme\Bundle\YuccaDemoBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Yucca\Component\Iterator\Iterator;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request, $user_id, $order_id)
    {
        if($order_id) {
            $order = $this->container->get('yucca.entity_manager')->load('Acme\Bundle\YuccaDemoBundle\Entity\Order', $order_id, $user_id);
        } else {
            $order = new Order();
        }

        $form = $this->createForm(new OrderType(), $order);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->container->get('yucca.entity_manager')->save($order);
            return $this->redirect(
                $this->generateUrl(
                    'acme_yucca_demo_users_show',
                    array('id'=>$user_id)
                )
            );
        }

        return $this->render('AcmeYuccaDemoBundle:Order:form.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
