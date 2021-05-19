<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/projet")
 */
class EtudcontroleController extends AbstractController{
/**
* @Route("/etude", name="etude", methods={"GET","POST"})
*/
    public function etude()
    {
    	return $this->render('etudcontrol.html.twig');
    }
}