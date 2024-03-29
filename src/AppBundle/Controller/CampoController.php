<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Campo;
use AppBundle\Form\CampoType;

/**
 * Campo controller.
 *
 * @Route("/campo")
 */
class CampoController extends Controller
{

    /**
     * Lists all Campo entities.
     *
     * @Route("/", name="campo")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Campo')->findAll();

        return $this->render('campo/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Campo entity.
     *
     * @Route("/", name="campo_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Campo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('campo_show', array('id' => $entity->getId())));
        }

        return $this->render('campo/new.html.twig',array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Campo entity.
     *
     * @param Campo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Campo $entity)
    {
        $form = $this->createForm(new CampoType(), $entity, array(
            'action' => $this->generateUrl('campo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Campo entity.
     *
     * @Route("/new", name="campo_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $entity = new Campo();
        $form   = $this->createCreateForm($entity);

        return $this->render('campo/new.html.twig',array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Campo entity.
     *
     * @Route("/{id}", name="campo_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Campo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('campo/show.html.twig',array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Campo entity.
     *
     * @Route("/{id}/edit", name="campo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Campo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Campo entity.
    *
    * @param Campo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Campo $entity)
    {
        $form = $this->createForm(new CampoType(), $entity, array(
            'action' => $this->generateUrl('campo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Campo entity.
     *
     * @Route("/{id}", name="campo_update")
     * @Method("PUT")
     * @Template("AppBundle:Campo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Campo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('campo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Campo entity.
     *
     * @Route("/{id}", name="campo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Campo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Campo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('campo'));
    }

    /**
     * Creates a form to delete a Campo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar', 'attr' => array('class' => 'btn btn-danger')))
            ->getForm()
        ;
    }
}
