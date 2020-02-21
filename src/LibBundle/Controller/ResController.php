<?php

namespace LibBundle\Controller;

use LibBundle\Entity\Res;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Re controller.
 *
 */
class ResController extends Controller
{
    /**
     * Lists all re entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $res = $em->getRepository('LibBundle:Res')->findAll();

        return $this->render('res/index.html.twig', array(
            'res' => $res,
        ));
    }

    /**
     * Creates a new re entity.
     *
     */
    public function newAction(Request $request)
    {
        $re = new Res();
        $form = $this->createForm('LibBundle\Form\ResType', $re);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($re);
            $em->flush();

            return $this->redirectToRoute('res_show', array('id' => $re->getId()));
        }

        return $this->render('res/new.html.twig', array(
            're' => $re,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a re entity.
     *
     */
    public function showAction(Res $re)
    {
        $deleteForm = $this->createDeleteForm($re);

        return $this->render('res/show.html.twig', array(
            're' => $re,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing re entity.
     *
     */
    public function editAction(Request $request, Res $re)
    {
        $deleteForm = $this->createDeleteForm($re);
        $editForm = $this->createForm('LibBundle\Form\ResType', $re);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_edit', array('id' => $re->getId()));
        }

        return $this->render('res/edit.html.twig', array(
            're' => $re,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a re entity.
     *
     */
    public function deleteAction(Request $request, Res $re)
    {
        $form = $this->createDeleteForm($re);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($re);
            $em->flush();
        }

        return $this->redirectToRoute('res_index');
    }

    /**
     * Creates a form to delete a re entity.
     *
     * @param Res $re The re entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Res $re)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('res_delete', array('id' => $re->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
