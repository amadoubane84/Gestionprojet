<?php

namespace App\Controller;

use App\Entity\APD;
use App\Form\APDType;
use App\Repository\APDRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/apd")
 */
class ApdController extends AbstractController
{
    /**
     * @Route("/", name="apd_index", methods={"GET"})
     */
    public function index(APDRepository $aPDRepository): Response
    {
        return $this->render('apd/index.html.twig', [
            'a_p_ds' => $aPDRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/new", name="apd_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $aPD = new APD();
        $form = $this->createForm(APDtype::class, $aPD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form['brochure']->getData();
           
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
               
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
       
                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $aPD->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($aPD);
                $entityManager->flush($aPD);
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('apd_index');
        }

        return $this->render('apd/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/{id}", name="apd_show", methods={"GET"})
     */
    public function show(APD $aPD): Response
    {
        return $this->render('apd/show.html.twig', [
            'a_p_d' => $aPD,
        ]);
    }
    /**
     * @Route("/{id}/edit", name="apd_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, APD $aPD,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(APDType::class, $aPD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             /** @var UploadedFile $brochureFile */
             $brochureFile = $form['brochure']->getData();
           
             if ($brochureFile) {
                 $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                 
                 $safeFilename = $slugger->slug($originalFilename);
                 $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
         
                 try {
                     $brochureFile->move(
                         $this->getParameter('brochures_directory'),
                         $newFilename
                     );
                 } catch (FileException $e) {
                     // ... handle exception if something happens during file upload
                 }
 
                 // updates the 'brochureFilename' property to store the PDF file name
                 // instead of its contents
                 $aPD->setBrochureFileName($newFilename);
                }  
             $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('apd_index');
        }

        return $this->render('apd/edit.html.twig', [
            'a_p_d' => $aPD,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="apd_delete", methods={"POST"})
     */
    public function delete(Request $request, APD $aPD): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aPD->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aPD);
            $entityManager->flush();
        }

        return $this->redirectToRoute('apd_index');
    }
}
