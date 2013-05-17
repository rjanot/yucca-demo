<?php

namespace YuccaDemo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YuccaDemo\DemoBundle\Form\DoubleTableFormType;

class DoubleTableController extends Controller
{
    public function indexAction()
    {
        $selector1 = $this->get('yucca.selector_manager')->getSelector('YuccaDemo\DemoBundle\Selector\DoubleTable1');
        $selector2 = $this->get('yucca.selector_manager')->getSelector('YuccaDemo\DemoBundle\Selector\DoubleTable2');

        $iterator1 = new \Yucca\Component\Iterator\Iterator($selector1, $this->get('yucca.entity_manager'), '\YuccaDemo\DemoBundle\Model\DoubleTable');
        $iterator2 = new \Yucca\Component\Iterator\Iterator($selector2, $this->get('yucca.entity_manager'), '\YuccaDemo\DemoBundle\Model\DoubleTable');

        return $this->render('YuccaDemoBundle:DoubleTable:list.html.twig', array(
            'list1'=>$iterator1,
            'list2'=>$iterator2,
        ));
    }

    public function readAction($id)
    {
        $doubleTableModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\DoubleTable', $id);

        return $this->render('YuccaDemoBundle:DoubleTable:read.html.twig', array(
            'item' => $doubleTableModel
        ));
    }

    public function deleteAction($id)
    {
        $doubleTableModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\DoubleTable', $id);
        $this->get('yucca.entity_manager')->remove($doubleTableModel);

        return $this->redirect($this->generateUrl('YuccaDemoBundle_double_list'));
    }

    public function formAction($id=null) {
        if(is_null($id)) {
            $doubleTableModel = new \YuccaDemo\DemoBundle\Model\DoubleTable;
        } else {
            $doubleTableModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\DoubleTable', $id);
        }

        $form = $this->createForm(new DoubleTableFormType(), $doubleTableModel);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->get('yucca.entity_manager')->save($doubleTableModel);

                return $this->redirect($this->generateUrl('YuccaDemoBundle_double_list'));
            }
        }

        return $this->render('YuccaDemoBundle:DoubleTable:form.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}
