<?php

namespace ALK\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ALK\WebBundle\Entity\Article;
use ALK\WebBundle\Form\ArticleType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	return $this->render('ALKWebBundle:Default:index.html.twig');
    }
}
