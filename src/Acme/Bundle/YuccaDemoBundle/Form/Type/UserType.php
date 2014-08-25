<?php

namespace Acme\Bundle\YuccaDemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SearchShortType
 *
 * @package Wlz\Bundle\CarBundle\Form\Type
 */
class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface  $builder
     * @param array                 $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('last_name', 'text')
            ->add('first_name', 'text')
            ->add('Save', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
