<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use App\Form\ConnexionParticipantType;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
    public function add(Request $request, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $unParticipant = new Participant;
        $form=$this->createForm(ParticipantType::class,$unParticipant);
        $form->handleRequest($request);
        if ($form->isSubmitted() == true)
        {
            $unParticipant->setPassword(
                $userPasswordHasher->hashPassword(
                        $unParticipant,
                        $form->get('password')->getData()
                    )
                );
            $em=$this->getDoctrine()->getManager();
            $em->persist($unParticipant);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('participant/inscription.html.twig', ['monForm'=>$form->createView()]);
    }

    /**
     * @Route("/participant/connexion", name="connexionParticipant")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('participant/connexion.html.twig', ['lastUsername' => $lastUsername, 'errors' => $error]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
    * @Route("/tableauDeBord", name="tableauDeBord")
    */
    public function tableauDeBord()
    {
        $repository = $this->getDoctrine()->getRepository(Participant::class);
        $unParticipant = $repository->findOneBy(['idparticipant' => $this->getUser()]);   
        return $this->render('participant/tableauDeBord.html.twig', ['unParticipant'=>$unParticipant]);
 
    }

}
