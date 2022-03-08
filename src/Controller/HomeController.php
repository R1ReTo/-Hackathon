<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Entity\Inscription;
use App\Entity\Participant;
use App\Form\ParticipantType;
use App\Repository\HackathonRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function accueil(): Response
    {
        return $this->render('pageAccueil.html.twig');
    }


    /**
     * @Route("/listeHackathon", name="listeHackathon")
     */
    public function index(HackathonRepository $hackathonRepository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $lesVilles = $hackathonRepository->selectville();
        return $this->render('listeHackathon.html.twig', ['lesHackathons' => $products, 'lesVilles' => $lesVilles]);       
    }

     /**
     * @Route("/listeHackathon/{ville}", name="villeHackathon")
     */
    public function lstville($ville, HackathonRepository $hackathonRepository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        
        $products = $repository->findBy(['ville' => $ville]);
        $lesVilles = $hackathonRepository->selectville();
        

        //$products = $repository->findAll();
        return $this->render('listeHackathon.html.twig', ['lesHackathons' => $products, 'lesVilles' => $lesVilles]);       
    }
    /**
     * @Route("/getHackathon", name="getHackathon",methods="GET")
     */
    public function getHackathon(): Response
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $json = $serializer->serialize($products, 'json');
        return new Response($json);
    }



    /**
     * @Route("/hackathon/{id}", name="detailHackathon")
     */
    public function detailHackathon($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->find($id);
        return $this->render('detailHackathon.html.twig', ['unHackathon' => $hackathon]);
    }


    /**
     * @Route("/hackathon/update/{id}", name="updateHackathon")
     */
    public function updateHackathon($id)
    {
        $participant = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $inscription = new Inscription;
        $hackathon = $repository->find($id);
        $uneDate = new \DateTime(date($format = 'Y-m-d'));
        $nbplace = $hackathon->getNbplaces();

        if ($nbplace <= 0) {

            echo "erreur";
        } 
        
        elseif ($hackathon->getDatelimite() <= $uneDate) {
            echo "erreur2";
        }
         
        elseif($participant == $inscription->getIdparticipant() && $hackathon == $inscription->getIdhackathon()){
            echo "Vous êtes déjà inscrit à cette évenement";
        }

        else {
            $hackathon->setNbplaces($hackathon->getNbplaces() - 1);
            $em = $this->getDoctrine()->getManager(); 
            $em->persist($hackathon);
            dump($hackathon->getIdhackathon());
            $inscription->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
            $inscription->setIdparticipant($participant);

            $inscription->setDateincription($uneDate);
            $em->persist($inscription);
            $em->flush();
        }
        return $this->render('pageAccueil.html.twig');
    }
}
