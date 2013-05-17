<?php

namespace YuccaDemo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YuccaDemo\DemoBundle\Form\SimpleTableFormType;

class SimpleTableController extends Controller
{
    public function indexAction()
    {
        $selector = $this->get('yucca.selector_manager')->getSelector('YuccaDemo\DemoBundle\Selector\SimpleTable');

        $iterator = new \Yucca\Component\Iterator\Iterator($selector, $this->get('yucca.entity_manager'), '\YuccaDemo\DemoBundle\Model\SimpleTable');

        return $this->render('YuccaDemoBundle:SimpleTable:list.html.twig', array(
            'list'=>$iterator
        ));
    }

    public function readAction($id)
    {
        $simpleTableModel = $this->getContainer()->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\SimpleTable', $id);

        return $this->render('YuccaDemoBundle:SimpleTable:read.html.twig', array(
            'item' => $simpleTableModel
        ));
    }

    public function deleteAction($id)
    {
        $simpleTableModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\SimpleTable', $id);
        $this->get('yucca.entity_manager')->remove($simpleTableModel);

        return $this->redirect($this->generateUrl('YuccaDemoBundle_simple_list'));
    }

    public function formAction() {
        $simpleTableModel = new \YuccaDemo\DemoBundle\Model\SimpleTable();

        $form = $this->createForm(new SimpleTableFormType(), $simpleTableModel);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->get('yucca.entity_manager')->save($simpleTableModel);

                return $this->redirect($this->generateUrl('YuccaDemoBundle_simple_list'));
            }
        }

        return $this->render('YuccaDemoBundle:SimpleTable:form.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}
