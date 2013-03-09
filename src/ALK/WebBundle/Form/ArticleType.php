<?php

namespace ALK\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpFoundation\Request;


class ArticleType extends AbstractType
{
    /*
    protected $myLocale;
    protected $allLanguages;


    public function __construct($var = "fr", $allLanguages = array('fr', 'en'))
    {
        $this->myLocale = $var;
        $this->allLanguages = $allLanguages;
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $correctedLanguages = "";

        // $languages = $this->allLanguages;
        // foreach($languages as $lang)
        // {
        //     if($lang != $this->myLocale)
        //         $correctedLanguages = $correctedLanguages . $lang . ' ';
        // }
        // $correctedLanguages = trim($correctedLanguages);
        // $correctedLanguages = explode(" ", $correctedLanguages);

        $builder
            ->add('title')
            ->add('Body')
            ->add('Date', 'date', array('widget' => 'single_text'))
            ->add('translations', 'a2lix_translations'/*, array(
                //'locales' => $correctedLanguages,
                 'locales' => $this->allLanguages
                )*/
            )
            ->add('category', 'collection', array('type'    => new CategoryType(),
                                                    'prototype' => true,
                                                    'allow_add' => true)
            );
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
