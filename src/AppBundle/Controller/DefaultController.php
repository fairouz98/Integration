<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }


     /**
     * @Route("/security", name="check_role")
     */
    public function checkRoleAction(Request $request)
    {

if ( $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN') ){

    return $this->redirectToRoute('easyadmin');

 
}else{

    
   return $this->render('default/user.html.twig');

}

    
    }

}
