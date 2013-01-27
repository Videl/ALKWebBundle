<?php

namespace ALK\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpFoundation\Request;


class ArticleType extends AbstractType
{

    protected $request;

    public function __constructor($req) 
    {
        $this->request = $req;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', null, array(
                'label' => "Title"))
            ->add('Body')
            ->add('Date')
            ->add('translations', 'a2lix_translations', array(
                'locales' => array('en', 'fr', 'ru')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ALK\WebBundle\Entity\Article',
            'translation_domain' => 'forms'
        ));
    }

    public function getName()
    {
        return 'alk_webbundle_articletype';
    }
}
