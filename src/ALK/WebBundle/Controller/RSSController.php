<?php

namespace ALK\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ALK\WebBundle\Entity\Article;
use ALK\WebBundle\Form\ArticleType;

class RSSController extends Controller
{
	public function articleRssGenerateAction()
	{
		$em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ALKWebBundle:Article')->findAll();

        return $this->render('ALKWebBundle:RSS:article.rss.twig', array(
        	'articles' => array_reverse($entity)
        	)
        );
	}
}