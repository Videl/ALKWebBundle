<?php

namespace ALK\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ALK\WebBundle\Entity\MenuHolder;
use ALK\WebBundle\Form\MenuHolderType;

/**
 * MenuHolder controller.
 *
 */
class MenuHolderController extends Controller
{
    /**
     * Lists all MenuHolder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ALKWebBundle:MenuHolder')->findAll();

        return $this->render('ALKWebBundle:MenuHolder:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a MenuHolder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALKWebBundle:MenuHolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MenuHolder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ALKWebBundle:MenuHolder:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new MenuHolder entity.
     *
     */
    public function newAction()
    {
        // Force defaultLocale into the translatableListener (Can be set by AOP for all new/edit method)

        $translatableListener = $this->get('stof_doctrine_extensions.listener.translatable');
        $translatableListener->setTranslatableLocale($translatableListener->getDefaultLocale());

        $entity = new MenuHolder();
        $form   = $this->createForm(new MenuHolderType(), $entity);

        return $this->render('ALKWebBundle:MenuHolder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new MenuHolder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new MenuHolder();
        $form = $this->createForm(new MenuHolderType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->setFlash('notice', 'New menu \''. $entity->getName() .'\' added !');

            return $this->redirect($this->generateUrl('menuholder_show', array('id' => $entity->getId())));
        }

        return $this->render('ALKWebBundle:MenuHolder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MenuHolder entity.
     *
     */
    public function editAction($id)
    {

        // Force defaultLocale into the translatableListener (Can be set by AOP for all new/edit method)

        $translatableListener = $this->get('stof_doctrine_extensions.listener.translatable');
        $translatableListener->setTranslatableLocale($translatableListener->getDefaultLocale());

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALKWebBundle:MenuHolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MenuHolder entity.');
        }

        $editForm = $this->createForm(new MenuHolderType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ALKWebBundle:MenuHolder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing MenuHolder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        
        // Force defaultLocale into the translatableListener (Can be set by AOP for all new/edit method)

        $translatableListener = $this->get('stof_doctrine_extensions.listener.translatable');
        $translatableListener->setTranslatableLocale($translatableListener->getDefaultLocale());
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALKWebBundle:MenuHolder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MenuHolder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MenuHolderType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            $this->get('session')->setFlash('notice', 'Menu \''. $entity->getName() .'\' updated !');

            return $this->redirect($this->generateUrl('menuholder_edit', array('id' => $id)));
        }

        return $this->render('ALKWebBundle:MenuHolder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MenuHolder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ALKWebBundle:MenuHolder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MenuHolder entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->setFlash('notice', 'Menu \''. $entity->getName() .'\' deleted !');
        }

        return $this->redirect($this->generateUrl('menuholder'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
