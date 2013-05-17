<?php
namespace YuccaDemo\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SimpleTableFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('lastName');
    }

    public function getName()
    {
        return 'simpleTable';
    }
}
