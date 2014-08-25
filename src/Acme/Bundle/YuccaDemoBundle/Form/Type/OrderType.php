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
class OrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface  $builder
     * @param array                 $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'user',
                'yucca_entity', array(
                    'required'=>true,
                    'model_class_name'=>'Acme\Bundle\YuccaDemoBundle\Entity\User',
                    'selector_class_name'=>'Acme\Bundle\YuccaDemoBundle\Selector\User',
                    'property'=>'email',
                )
            )
            ->add('amount', 'text')
            ->add('createdAt', 'date')
            ->add('Save', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'order';
    }
}
