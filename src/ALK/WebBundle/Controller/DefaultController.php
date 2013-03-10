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
    	$em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ALKWebBundle:MenuHolder')->findAll();
        $allMenus = array();
        $zeroesMenu = array();
        $firstMenu = array();
        $secondMenu = array();
        $thirdMenu = array();
        $articleMenu = new \ALK\WebBundle\Entity\Article();

        foreach ($entities as $objectMenu) {
        	$menu = array(
        		'name' => $objectMenu->getName(),
        		'description' => $objectMenu->getDescription(),
        		'target' => ($objectMenu->getUrlType() == 'article' ? 'alk_article' : 'alk_listarticleswithtags'),
        		'targetid' => $objectMenu->getUrl()
        		);

        	if($objectMenu->getLocation() == 0)
        		$zeroesMenu[] = $menu;
        	else if($objectMenu->getLocation() == 1)
        		$firstMenu[] = $menu;
        	else if($objectMenu->getLocation() == 5)
        		$articleMenu = $em->getRepository('ALKWebBundle:Article')->find($menu['targetid']);
        	else
        		$allMenus[] = $menu;
        }

    	return $this->render('ALKWebBundle:Default:index.html.twig', array(
    		'menuTop' => $zeroesMenu,
    		'menuNavbar' => $firstMenu,
    		'articleMenu' => $articleMenu
    		));
    }
}
