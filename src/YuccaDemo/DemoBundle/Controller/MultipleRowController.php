<?php

namespace YuccaDemo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YuccaDemo\DemoBundle\Form\MultipleRowFormType;

class MultipleRowController extends Controller
{
    public function indexAction()
    {
        $selector = $this->get('yucca.selector_manager')->getSelector('YuccaDemo\DemoBundle\Selector\MultipleRow');

        $iterator = new \Yucca\Component\Iterator\Iterator($selector, $this->get('yucca.entity_manager'), '\YuccaDemo\DemoBundle\Model\MultipleRow');

        return $this->render('YuccaDemoBundle:MultipleRow:list.html.twig', array(
            'list'=>$iterator
        ));
    }

    public function readAction($id)
    {
        $multipleRowModel = $this->getContainer()->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\MultipleRow', $id);

        return $this->render('YuccaDemoBundle:MultipleRow:read.html.twig', array(
            'item' => $multipleRowModel
        ));
    }

    public function deleteAction($id)
    {
        $multipleRowModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\MultipleRow', $id);
        $this->get('yucca.entity_manager')->remove($multipleRowModel);

        return $this->redirect($this->generateUrl('YuccaDemoBundle_multiple_list'));
    }

    public function formAction($id=null) {
        if(is_null($id)) {
            $multipleRowModel = new \YuccaDemo\DemoBundle\Model\MultipleRow;
        } else {
            $multipleRowModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\MultipleRow', $id);
        }

        $form = $this->createForm(new MultipleRowFormType(), $multipleRowModel);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->get('yucca.entity_manager')->save($multipleRowModel);

                return $this->redirect($this->generateUrl('YuccaDemoBundle_multiple_list'));
            }
        }

        return $this->render('YuccaDemoBundle:MultipleRow:form.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}
