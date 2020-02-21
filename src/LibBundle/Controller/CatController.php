<?php

namespace LibBundle\Controller;

use LibBundle\Entity\Cat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cat controller.
 *
 * @Route("cat")
 */
class CatController extends Controller
{
    /**
     * Lists all cat entities.
     *
     * @Route("/", name="cat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cats = $em->getRepository('LibBundle:Cat')->findAll();

        return $this->render('cat/index.html.twig', array(
            'cats' => $cats,
        ));
    }

    /**
     * Creates a new cat entity.
     *
     * @Route("/new", name="cat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cat = new Cat();
        $form = $this->createForm('LibBundle\Form\CatType', $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('cat_show', array('id' => $cat->getId()));
        }

        return $this->render('cat/new.html.twig', array(
            'cat' => $cat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cat entity.
     *
     * @Route("/{id}", name="cat_show")
     * @Method("GET")
     */
    public function showAction(Cat $cat)
    {
        $deleteForm = $this->createDeleteForm($cat);

        return $this->render('cat/show.html.twig', array(
            'cat' => $cat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cat entity.
     *
     * @Route("/{id}/edit", name="cat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cat $cat)
    {
        $deleteForm = $this->createDeleteForm($cat);
        $editForm = $this->createForm('LibBundle\Form\CatType', $cat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cat_edit', array('id' => $cat->getId()));
        }

        return $this->render('cat/edit.html.twig', array(
            'cat' => $cat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cat entity.
     *
     * @Route("/{id}", name="cat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cat $cat)
    {
        $form = $this->createDeleteForm($cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cat);
            $em->flush();
        }

        return $this->redirectToRoute('cat_index');
    }

    /**
     * Creates a form to delete a cat entity.
     *
     * @param Cat $cat The cat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cat $cat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cat_delete', array('id' => $cat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
