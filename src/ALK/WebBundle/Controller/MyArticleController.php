<?php

namespace ALK\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ALK\WebBundle\Entity\Article;
use ALK\WebBundle\Form\ArticleType;

/**
 * Article controller.
 *
 */
class MyArticleController extends Controller
{
	public function showAction($id, $locale = 'fr')
	{
		$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALKWebBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ALKWebBundle:Default:onearticle.html.twig', array(
            'article'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
	}

	public function editAction($id = null)
	{
		$em = $this->getDoctrine()->getManager();

		if($id)
		{
			$entity = $em->getRepository('ALKWebBundle:Article')->find($id);

			if (!$entity) {
                throw $this->createNotFoundException('Unable to find Article entity.');
            }

            $deleteForm = $this->createDeleteForm($id);
		} else {
            $entity = new Article();
        }

        $editForm = $this->createForm(new ArticleType(), $entity);
        $request = $this->getRequest();
        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em->persist($entity);
                $em->flush();
                //$this->get('session')->setFlash('notice', ($id ? 'Edited!' : 'Created!'));

                return $this->redirect($this->generateUrl('alk_article', array('id' => $entity->getId())));
            }
        }

        
        return $this->render('ALKWebBundle:MyArticles:edit.html.twig',
        	array(
        		'article'  => $entity,
	            'editForm' => $editForm->createView()
				)
        + ($id ? array('delete_form' => $deleteForm->createView()) : array())
        );
	}

	public function deleteAction($id)
	{
		return $this->redirect($this->generateUrl('alk_web_homepage'));
	}

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}