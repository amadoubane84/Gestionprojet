<?php

namespace App\Controller;

use App\Entity\Rmensuel;
use App\Form\RmensuelType;
use App\Repository\RmensuelRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/rmensuel")
 */
class RmensuelController extends AbstractController
{
    /**
     * @Route("/", name="rmensuel_index", methods={"GET"})
     */
    public function index(RmensuelRepository $rmensuelRepository): Response
    {
        return $this->render('rmensuel/index.html.twig', [
            'rmensuels' => $rmensuelRepository->findAll(),
        ]);

    }
    
    /**
    * @Route("/new", name="rmensuel_new", methods={"GET","POST"})
    */
   public function new(Request $request, SluggerInterface $slugger)
   {
       $rmensuel = new rmensuel();
       $form = $this->createForm(RmensuelType::class, $rmensuel);
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
               $rmensuel->setBrochureFileName($newFilename);
               $entityManager=$this->getDoctrine()->getManager();
               $entityManager->persist($rmensuel);
               $entityManager->flush();
           }

           // ... persist the $product variable or any other work

           return $this->redirectToRoute('rmensuel_index');
       }

       return $this->render('rmensuel/new.html.twig', [
           'form' => $form->createView(),
       ]);
   }
    /**
     * @Route("/{id}", name="rmensuel_show", methods={"GET"})
     */
    public function show(Rmensuel $rmensuel): Response
    {
        return $this->render('rmensuel/show.html.twig', [
            'rmensuel' => $rmensuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rmensuel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rmensuel $rmensuel): Response
    {
        $form = $this->createForm(RmensuelType::class, $rmensuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rmensuel_index');
        }

        return $this->render('rmensuel/edit.html.twig', [
            'rmensuel' => $rmensuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rmensuel_delete", methods={"POST"})
     */
    public function delete(Request $request, Rmensuel $rmensuel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rmensuel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rmensuel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rmensuel_index');
    }
}
