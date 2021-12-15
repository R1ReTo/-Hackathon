<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/participant", name="participant")
     */
    public function index(): Response
    {
        return $this->render('participant/index.html.twig', [
            'controller_name' => 'ParticipantController',
        ]);
    }

    /**
     * @Route("/participant/add", name="addParticipant")
     */
    public function add(Request $request): Response
    {
        $unParticipant = new Participant;
        $form=$this->createForm(ParticipantType::class,$unParticipant);
        $form->handleRequest($request);
        if ($form->isSubmitted() == true)
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($unParticipant);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('participant/inscription.html.twig', ['monForm'=>$form->createView()]);
    }
}