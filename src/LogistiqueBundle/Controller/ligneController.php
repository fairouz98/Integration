<?php

namespace LogistiqueBundle\Controller;

use LogistiqueBundle\Entity\ligne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ligne controller.
 *
 */
class ligneController extends Controller
{
    /**
     * Lists all ligne entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lignes = $em->getRepository('LogistiqueBundle:ligne')->findAll();

        return $this->render('ligne/index.html.twig', array(
            'lignes' => $lignes,
        ));
    }

    /**
     * Creates a new ligne entity.
     *
     */
    public function newAction(Request $request)
    {
        $ligne = new Ligne();
        $form = $this->createForm('LogistiqueBundle\Form\ligneType', $ligne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ligne);
            $em->flush();

            return $this->redirectToRoute('ligne_show', array('id' => $ligne->getId()));
        }

        return $this->render('ligne/new.html.twig', array(
            'ligne' => $ligne,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ligne entity.
     *
     */
    public function showAction(ligne $ligne)
    {
        $deleteForm = $this->createDeleteForm($ligne);

        return $this->render('ligne/show.html.twig', array(
            'ligne' => $ligne,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ligne entity.
     *
     */
    public function editAction(Request $request, ligne $ligne)
    {
        $deleteForm = $this->createDeleteForm($ligne);
        $editForm = $this->createForm('LogistiqueBundle\Form\ligneType', $ligne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligne_edit', array('id' => $ligne->getId()));
        }

        return $this->render('ligne/edit.html.twig', array(
            'ligne' => $ligne,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ligne entity.
     *
     */
    public function deleteAction(Request $request, ligne $ligne)
    {
        $form = $this->createDeleteForm($ligne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ligne);
            $em->flush();
        }

        return $this->redirectToRoute('ligne_index');
    }

    /**
     * Creates a form to delete a ligne entity.
     *
     * @param ligne $ligne The ligne entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ligne $ligne)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligne_delete', array('id' => $ligne->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
