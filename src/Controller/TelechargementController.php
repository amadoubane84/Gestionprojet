<?php

namespace App\Controller;

use App\Entity\Telechargement;
use App\Form\TelechargementType;
use App\Repository\TelechargementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * @Route("/telechargement")
 */
class TelechargementController extends AbstractController
{
    /**
     * @Route("/", name="telechargement_index", methods={"GET"})
     */
    public function index(TelechargementRepository $telechargementRepository): Response
    {
        return $this->render('telechargement/index.html.twig', [
            'telechargements' => $telechargementRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/new", name="telechargement_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $telechargement = new Telechargement();
        $form = $this->createForm(TelechargementType::class, $telechargement);
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
                $telechargement->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($telechargement);
                $entityManager->flush();
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('projet_index');
        }

        return $this->render('telechargement/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    


    /**
     * @Route("/{id}", name="telechargement_show", methods={"GET"})
     */
    public function show(Telechargement $telechargement): Response
    {
        return $this->render('telechargement/show.html.twig', [
            'telechargement' => $telechargement,
        ]);
    }
    /**
     * @Route("/{id}/edit", name="telechargement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Telechargement $telechargement,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(TelechargementType::class, $telechargement);
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
                 $telechargement->setBrochureFileName($newFilename);
                }  
             $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('telechargement_index');
        }

        return $this->render('telechargement/edit.html.twig', [
            'telechargement' => $telechargement,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="telechargement_delete", methods={"POST"})
     */
    public function delete(Request $request, Telechargement $telechargement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telechargement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($telechargement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('telechargement_index');
    }
}
