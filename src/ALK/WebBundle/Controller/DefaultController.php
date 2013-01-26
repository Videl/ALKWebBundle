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
        //return $this->render('ALKWebBundle:Default:index.html.twig', array('name' => $name));
    }

    public function viewArticleAction($id)
    {
    	$locale = $this->getRequest()->getLocale();
    	return $this->render('ALKWebBundle:Article:article.html.twig', array('id' => $id,
    		'locale' => $locale));
        //return $this->render('ALKWebBundle:Default:index.html.twig', array('name' => $name));
    }

    public function fillerAction() 
    {
        $article = new Article();
        $article->setTitle("Salut les potos");
        $article->setBody("Je suis le contenu, hihihihihi :).");
        $article->setDate(new \Datetime());
        $article->setTranslatableLocale('fr'); // change locale
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return $this->render('ALKWebBundle:Default:onearticle.html.twig', array('message' => "Okay!"));

    }
}
