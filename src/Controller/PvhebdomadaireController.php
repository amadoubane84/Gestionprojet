<?php

namespace App\Controller;

use App\Entity\Pvhebdomadaire;
use App\Form\PvhebdomadaireType;
use App\Repository\PvhebdomadaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/pvhebdomadaire")
 */
class PvhebdomadaireController extends AbstractController
{
    /**
     * @Route("/", name="pvhebdomadaire_index", methods={"GET"})
     */
    public function index(PvhebdomadaireRepository $pvhebdomadaireRepository): Response
    {
        return $this->render('pvhebdomadaire/index.html.twig', [
            'pvhebdomadaires' => $pvhebdomadaireRepository->findAll(),
        ]);
    }

    /**
    * @Route("/new", name="pvhebdomadaire_new", methods={"GET","POST"})
    */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $pvhebdomadaire = new pvhebdomadaire();
        $form = $this->createForm(PvhebdomadaireType::class, $pvhebdomadaire);
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
                $pvhebdomadaire->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($pvhebdomadaire);
                $entityManager->flush();
            }
 
            // ... persist the $product variable or any other work
 
            return $this->redirectToRoute('pvhebdomadaire_index');
        }
 
        return $this->render('pvhebdomadaire/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pvhebdomadaire_show", methods={"GET"})
     */
    public function show(Pvhebdomadaire $pvhebdomadaire): Response
    {
        return $this->render('pvhebdomadaire/show.html.twig', [
            'pvhebdomadaire' => $pvhebdomadaire,
        ]);
    }

    

    /**
     * @Route("/{id}/edit", name="pvhebdomadaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pvhebdomadaire $pvhebdomadaire): Response
    {
        $form = $this->createForm(PvhebdomadaireType::class, $pvhebdomadaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pvhebdomadaire_index');
        }

        return $this->render('pvhebdomadaire/edit.html.twig', [
            'pvhebdomadaire' => $pvhebdomadaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pvhebdomadaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Pvhebdomadaire $pvhebdomadaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pvhebdomadaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pvhebdomadaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pvhebdomadaire_index');
    }
}
