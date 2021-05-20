<?php

namespace App\Controller;


use App\Entity\Suivi;
use App\Form\SuiviType;
use App\Repository\SuiviRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/suivi")
 */
class SuiviController extends AbstractController
{
    /**
     * @Route("/", name="suivi_index", methods={"GET"})
     * @param SuiviRepository $suiviRepository
     * @return Response
     */
    public function index(SuiviRepository $suiviRepository): Response
    {
        return $this->render('suivi/index.html.twig', [
            'suivis' => $suiviRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="suivi_new", methods={"GET","POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $suivi = new Suivi();
        $form = $this->createForm(Suivitype::class, $suivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form['brochure']->getData();
            $brochureFile1 = $form['brochure1']->getData();
            $brochureFile2 = $form['brochure2']->getData();
            $brochureFile3 = $form['brochure3']->getData();
            $brochureFile4 = $form['brochure4']->getData();
            $brochureFile5 = $form['brochure5']->getData();
            $brochureFile6 = $form['brochure6']->getData();
            $brochureFile7 = $form['brochure7']->getData();
            $brochureFile8 = $form['brochure8']->getData();
            $brochureFile9 = $form['brochure9']->getData();

            if ($brochureFile && $brochureFile1 && $brochureFile2 && $brochureFile3 && $brochureFile4 && $brochureFile5 && $brochureFile6 && $brochureFile7 && $brochureFile8 && $brochureFile9 ) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename1 = pathinfo($brochureFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename2 = pathinfo($brochureFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename3 = pathinfo($brochureFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename4 = pathinfo($brochureFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename5 = pathinfo($brochureFile5->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename6 = pathinfo($brochureFile6->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename7 = pathinfo($brochureFile7->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename8 = pathinfo($brochureFile8->getClientOriginalName(), PATHINFO_FILENAME);
                $originalFilename9 = pathinfo($brochureFile9->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
                $safeFilename1 = $slugger->slug($originalFilename1);
                $newFilename1 = $safeFilename1.'-'.uniqid().'.'.$brochureFile1->guessExtension();
                $safeFilename2 = $slugger->slug($originalFilename2);
                $newFilename2 = $safeFilename2.'-'.uniqid().'.'.$brochureFile2->guessExtension();
                $safeFilename3 = $slugger->slug($originalFilename3);
                $newFilename3 = $safeFilename3.'-'.uniqid().'.'.$brochureFile3->guessExtension();
                $safeFilename4 = $slugger->slug($originalFilename4);
                $newFilename4 = $safeFilename4.'-'.uniqid().'.'.$brochureFile4->guessExtension();
                $safeFilename5 = $slugger->slug($originalFilename5);
                $newFilename5 = $safeFilename5.'-'.uniqid().'.'.$brochureFile5->guessExtension();
                $safeFilename6 = $slugger->slug($originalFilename6);
                $newFilename6 = $safeFilename6.'-'.uniqid().'.'.$brochureFile6->guessExtension();
                $safeFilename7 = $slugger->slug($originalFilename7);
                $newFilename7 = $safeFilename7.'-'.uniqid().'.'.$brochureFile7->guessExtension();
                $safeFilename8 = $slugger->slug($originalFilename8);
                $newFilename8 = $safeFilename8.'-'.uniqid().'.'.$brochureFile8->guessExtension();
                $safeFilename9 = $slugger->slug($originalFilename9);
                $newFilename9 = $safeFilename9.'-'.uniqid().'.'.$brochureFile9->guessExtension();

                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                    $brochureFile1->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename1
                    );
                    $brochureFile2->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename2
                    );
                    $brochureFile3->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename3
                    );
                    $brochureFile4->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename4
                    );
                    $brochureFile5->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename5
                    );
                    $brochureFile6->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename6
                    );
                    $brochureFile7->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename7
                    );
                    $brochureFile8->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename8
                    );
                    $brochureFile9->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename9
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $suivi->setReunionDeDemarrage($newFilename);
                $suivi->setContratDeTravaux($newFilename1);
                $suivi->setOrdreDeService($newFilename2);
                $suivi->setImplantation($newFilename3);
                $suivi->setDossiersExecution($newFilename4);
                $suivi->setPvReceptionProvisoire($newFilename5);
                $suivi->setPvLeveeDeReserves($newFilename6);
                $suivi->setPvReceptionDefinitive($newFilename7);
                $suivi->setRapportAnnuel($newFilename8);
                $suivi->setRapportFinal($newFilename9);

                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($suivi);
                $entityManager->flush();
            }
            return $this->redirectToRoute('suivi_index');
        }
        return $this->render('suivi/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_show", methods={"GET"})
     * @param Suivi $suivi
     * @return Response
     */
    public function show(Suivi $suivi): Response
    {
        return $this->render('suivi/show.html.twig', [
            'suivi' => $suivi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="suivi_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Suivi $suivi
     * @return Response
     */
    public function edit(Request $request, Suivi $suivi): Response
    {
        $form = $this->createForm(SuiviType::class, $suivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suivi_index');
        }

        return $this->render('suivi/edit.html.twig', [
            'suivi' => $suivi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivi_delete", methods={"POST"})
     * @param Request $request
     * @param Suivi $suivi
     * @return Response
     */
    public function delete(Request $request, Suivi $suivi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suivi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($suivi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suivi_index');
    }
}
