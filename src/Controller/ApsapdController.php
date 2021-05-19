<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/projet")
 */
class ApsapdController extends AbstractController{
/**
* @Route("/menu", name="menu", methods={"GET","POST"})
*/
    public function menu()
    {
    	return $this->render('apsapd.html.twig');
    }
}