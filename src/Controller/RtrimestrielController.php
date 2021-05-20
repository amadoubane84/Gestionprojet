<?php

namespace App\Controller;

use App\Entity\Rtrimestriel;
use App\Form\RtrimestrielType;
use App\Repository\RtrimestrielRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/rtrimestriel")
 */
class RtrimestrielController extends AbstractController
{
    /**
     * @Route("/", name="rtrimestriel_index", methods={"GET"})
     */
    public function index(RtrimestrielRepository $rtrimestrielRepository): Response
    {
        return $this->render('rtrimestriel/index.html.twig', [
            'rtrimestriels' => $rtrimestrielRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/new", name="rtrimestriel_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $rtrimestriel = new Rtrimestriel();
        $form = $this->createForm(RtrimestrielType::class, $rtrimestriel);
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
                $rtrimestriel->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($rtrimestriel);
                $entityManager->flush();
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('rtrimestriel_index');
        }

        return $this->render('rtrimestriel/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rtrimestriel_show", methods={"GET"})
     */
    public function show(Rtrimestriel $rtrimestriel): Response
    {
        return $this->render('rtrimestriel/show.html.twig', [
            'rtrimestriel' => $rtrimestriel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rtrimestriel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rtrimestriel $rtrimestriel): Response
    {
        $form = $this->createForm(RtrimestrielType::class, $rtrimestriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rtrimestriel_index');
        }

        return $this->render('rtrimestriel/edit.html.twig', [
            'rtrimestriel' => $rtrimestriel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rtrimestriel_delete", methods={"POST"})
     */
    public function delete(Request $request, Rtrimestriel $rtrimestriel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rtrimestriel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rtrimestriel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rtrimestriel_index');
    }
}
