<?php

namespace App\Controller;

use App\Entity\Visite;
use App\Form\VisiteType;
use App\Repository\VisiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


/**
 * @Route("/visite")
 */
class VisiteController extends AbstractController
{
    /**
     * @Route("/", name="visite_index", methods={"GET"})
     */
    public function index(VisiteRepository $visiteRepository): Response
    {
        return $this->render('visite/index.html.twig', [
            'visites' => $visiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="visite_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $visite = new Visite();
        $form = $this->createForm(VisiteType::class, $visite);
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
                $visite->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($visite);
                $entityManager->flush($visite);
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('visite_index');
        }

        return $this->render('visite/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
/**
     * @Route("/{id}", name="visite_show", methods={"GET"})
     */
    public function show(Visite $visite): Response
    {
        return $this->render('visite/show.html.twig', [
            'visite' => $visite,
        ]);
    }
       
/**
     * @Route("/{id}/edit", name="visite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Visite $visite,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(VisiteType::class, $visite);
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
                 $visite->setBrochureFileName($newFilename);
                }  
             $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('visite_index');
        }

        return $this->render('visite/edit.html.twig', [
            'visite' => $visite,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="visite_delete", methods={"POST"})
     */
    public function delete(Request $request, Visite $visite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($visite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('visite_index');
    }
}
