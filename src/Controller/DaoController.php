<?php

namespace App\Controller;

use App\Entity\DAO;
use App\Form\DAOType;
use App\Repository\DAORepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/dao")
 */
class DaoController extends AbstractController
{
    /**
     * @Route("/", name="dao_index", methods={"GET"})
     */
    public function index(DAORepository $dAORepository): Response
    {
        return $this->render('dao/index.html.twig', [
            'd_a_os' => $dAORepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/new", name="dao_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $dAO = new DAO();
        $form = $this->createForm(DAOtype::class, $dAO);
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
                $dAO->setBrochureFileName($newFilename);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($dAO);
                $entityManager->flush($dAO);
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('dao_index');
        }

        return $this->render('dao/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    

    /**
     * @Route("/{id}", name="dao_show", methods={"GET"})
     */
    public function show(DAO $dAO): Response
    {
        return $this->render('dao/show.html.twig', [
            'd_a_o' => $dAO,
        ]);
    }
    /**
     * @Route("/{id}/edit", name="dao_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DAO $dAO,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(DAOType::class, $dAO);
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
                 $dAO->setBrochureFileName($newFilename);
                }  
             $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dao_index');
        }

        return $this->render('dao/edit.html.twig', [
            'd_a_o' => $dAO,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}", name="dao_delete", methods={"POST"})
     */
    public function delete(Request $request, DAO $dAO): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dAO->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dAO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dao_index');
    }
}
