<?php

namespace App\Controller;

use App\Entity\Pvmensuel;
use App\Form\PvmensuelType;
use App\Repository\PvmensuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pvmensuel")
 */
class PvmensuelController extends AbstractController
{
    /**
     * @Route("/", name="pvmensuel_index", methods={"GET"})
     */
    public function index(PvmensuelRepository $pvmensuelRepository): Response
    {
        return $this->render('pvmensuel/index.html.twig', [
            'pvmensuels' => $pvmensuelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pvmensuel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pvmensuel = new Pvmensuel();
        $form = $this->createForm(PvmensuelType::class, $pvmensuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pvmensuel);
            $entityManager->flush();

            return $this->redirectToRoute('pvmensuel_index');
        }

        return $this->render('pvmensuel/new.html.twig', [
            'pvmensuel' => $pvmensuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pvmensuel_show", methods={"GET"})
     */
    public function show(Pvmensuel $pvmensuel): Response
    {
        return $this->render('pvmensuel/show.html.twig', [
            'pvmensuel' => $pvmensuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pvmensuel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pvmensuel $pvmensuel): Response
    {
        $form = $this->createForm(PvmensuelType::class, $pvmensuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pvmensuel_index');
        }

        return $this->render('pvmensuel/edit.html.twig', [
            'pvmensuel' => $pvmensuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pvmensuel_delete", methods={"POST"})
     */
    public function delete(Request $request, Pvmensuel $pvmensuel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pvmensuel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pvmensuel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pvmensuel_index');
    }
}
