<?php
namespace YuccaDemo\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MultipleRowFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('backgroundColor');
        $builder->add('color');
    }

    public function getName()
    {
        return 'multipleRow';
    }
}
