<?php
namespace YuccaDemo\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DoubleTableFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('login');
        $builder->add('password');
    }

    public function getName()
    {
        return 'doubleTable';
    }
}
