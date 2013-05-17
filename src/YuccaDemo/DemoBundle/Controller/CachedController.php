<?php

namespace YuccaDemo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YuccaDemo\DemoBundle\Form\CachedFormType;

class CachedController extends Controller
{
    public function indexAction()
    {
        $selector = $this->get('yucca.selector_manager')->getSelector('YuccaDemo\DemoBundle\Selector\Cached');

        $iterator = new \Yucca\Component\Iterator\Iterator($selector, $this->get('yucca.entity_manager'), '\YuccaDemo\DemoBundle\Model\Cached');

        return $this->render('YuccaDemoBundle:Cached:list.html.twig', array(
            'list'=>$iterator
        ));
    }

    public function readAction($id)
    {
        $cachedModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\Cached', $id);

        return $this->render('YuccaDemoBundle:Cached:read.html.twig', array(
            'item' => $cachedModel
        ));
    }

    public function deleteAction($id)
    {
        $cachedModel = $this->get('yucca.entity_manager')->load('\YuccaDemo\DemoBundle\Model\Cached', $id);
        $this->get('yucca.entity_manager')->remove($cachedModel);

        return $this->redirect($this->generateUrl('YuccaDemoBundle_cached_list'));
    }

    public function formAction() {
        $cachedModel = new \YuccaDemo\DemoBundle\Model\Cached();

        $form = $this->createForm(new CachedFormType(), $cachedModel);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $this->get('yucca.entity_manager')->save($cachedModel);

                return $this->redirect($this->generateUrl('YuccaDemoBundle_cached_list'));
            }
        }

        return $this->render('YuccaDemoBundle:Cached:form.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}
