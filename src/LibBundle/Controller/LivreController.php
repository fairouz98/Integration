<?php

namespace LibBundle\Controller;

use LibBundle\Entity\Livre;
use LibBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Livre controller.
 *
 * @Route("livre")
 */
class LivreController extends Controller
{
    /**
     * Lists all livre entities.
     *
     * @Route("/", name="livre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('LibBundle:Livre')->findAll();

        return $this->render('livre/index.html.twig', array(
            'livres' => $livres,
        ));
    }


    public function livreparcatAction(Categorie $cat)
    {
        $livres = $this->getDoctrine()->getManager()
            ->getRepository(Livre::class)->findBycat($cat);
        return ($this->render('Categorie/show.html.twig', array("livres" => $livres,'categorie' => $cat,)));
    }




    /**
     * Finds and displays a livre entity.
     *
     * @Route("/{id}", name="livre_show")
     * @Method("GET")
     */
    public function showAction(Request $request,Livre $livre)
    {      $id = 'thread_id';
        $thread = $this->container->get('fos_comment.manager.thread')->findThreadById($id);
        if (null === $thread) {
            $thread = $this->container->get('fos_comment.manager.thread')->createThread();
            $thread->setId($id);
            $thread->setPermalink($request->getUri());
    
            // Add the thread
            $this->container->get('fos_comment.manager.thread')->saveThread($thread);
        }
    
        $comments = $this->container->get('fos_comment.manager.comment')->findCommentTreeByThread($thread);

        return $this->render('livre/show.html.twig', array(
            'livre' => $livre,
            'comments' => $comments,
        'thread' => $thread,
        ));
    }
}
