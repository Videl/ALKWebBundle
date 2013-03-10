<?php

namespace ALK\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuHolderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('urlType')
            ->add('url')
            ->add('location')
            ->add('priority')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ALK\WebBundle\Entity\MenuHolder'
        ));
    }

    public function getName()
    {
        return 'alk_webbundle_menuholdertype';
    }
}
