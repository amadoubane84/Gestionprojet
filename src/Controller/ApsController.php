<?php

namespace App\Controller;

use App\Entity\APS;
use App\Form\APSType;
use App\Repository\APSRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/aps")
 */
class ApsController extends AbstractController
{
    /**
     * @Route("/", name="aps_index", methods={"GET"})
     * @param APSRepository $aPSRepository
     * @return Response
     */
    public function index(APSRepository $aPSRepository): Response
    {
        return $this->render('aps/index.html.twig', [
            'a_ps' => $aPSRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aps_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return RedirectResponse|Response
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $aP = new APS();
        $form = $this->createForm(APStype::class, $aP);
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
                $aP->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($aP);
                $entityManager->flush();
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('aps_index');
        }

        return $this->render('aps/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aps_show", methods={"GET"})
     * @param APS $aP
     * @return Response
     */
    public function show(APS $aP): Response
    {
        return $this->render('aps/show.html.twig', [
            'a_p' => $aP,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aps_edit", methods={"GET","POST"})
     * @param Request $request
     * @param APS $aP
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, APS $aP,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(APSType::class, $aP);
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
                 $aP->setBrochureFileName($newFilename);
                }  
             $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aps_index');
        }

        return $this->render('aps/edit.html.twig', [
            'a_p' => $aP,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="aps_delete", methods={"POST"})
     * @param Request $request
     * @param APS $aP
     * @return Response
     */
    public function delete(Request $request, APS $aP): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aP->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aP);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aps_index');
    }
}
