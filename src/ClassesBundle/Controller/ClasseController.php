<?php

namespace ClassesBundle\Controller;

use ClassesBundle\Entity\Classe;
use ClassesBundle\Form\ClasseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClasseController extends Controller
{
    public function createAction(Request $request)
    {
        //creer un objet vide
        $classe= new Classe();
        $classe->setNbrEtudiants(0);
        // creer notre formulaire
        $form=$this->createForm(ClasseType::class,$classe);
        //recuperation de donnes
        $form=$form->handleRequest($request);
        //test sur les donnees
        if($form->isValid())
        {
            //creation d un objet doctrine
            $em=$this->getDoctrine()->getManager();
            //persister les donnees dans ORM

            $em->persist($classe);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('classe_read');
        }
        // envoyer ce formulaire à l utilisateur
        return $this->render('@Classes/Classe/create.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    public function readAction()
    {
        $em=$this->getDoctrine();
        $liste=$em->getRepository(Classe::class)->findAll();
        return $this->render('@Classes/Classe/read.html.twig',array(
            "liste"=>$liste
        ));

    }
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $classe=$em->getRepository(Classe::class)->find($id);
        $em->remove($classe);
        $em->flush();
        return $this->redirectToRoute('classe_read');

    }
    public function updateAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $classe=$em->getRepository(Classe::class)->find($id);
        $form=$this->createForm(ClasseType::class,$classe);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {

            //persister les donnees dans ORM
            $em->persist($classe);
            //sauvegarder les donnees dans BD
            $em->flush();
            return $this->redirectToRoute('classe_read');
        }



        return $this->render('@Classes/Classe/update.html.twig',array(
            'form'=>$form->createView()
        ));




    }

    public function EtudiantsAction($id)
    {
        $em=$this->getDoctrine();
        $classe=$em->getRepository(Classe::class)->find($id);
        $liste=$em->getRepository(Classe::class)->searchEtudiants($id);
        return $this->render('@Classes/Classe/viewEtudiants.html.twig',array(
            "liste"=>$liste,"classe"=>$classe
        ));
    }


}
