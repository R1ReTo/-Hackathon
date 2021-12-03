<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Entity\Inscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer;

class HomeController extends AbstractController
{
    /**
     * @Route("/listeHackathon", name="listeHackathon")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        return $this->render('listeHackathon.html.twig', ['lesHackathons' => $products]);       
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
     * @Route("/", name="home")
     */
    public function accueil(): Response
    {
        return $this->render('pageAccueil.html.twig');
    }

    /**
     * @Route("/hackathon/{id}", name="detailHackathon")
     */
    public function detailHackathon($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->find($id);
        return $this->render('detailHackathon.html.twig',['unHackathon'=>$hackathon]);
    }

    /**
     * @Route("/inscription/{idparticipant}&{idhackathon}&{dateincription}", name="detailHackathon")
     */
   /* public function inscription($idparticipant,$idhackathon,$dateincription)
    {
        $inscription = new Inscription();
        $inscription->setIdparticipant($idparticipant);
        $inscription->setIdhackathon($idhackathon);
        $inscription->setDateincription($dateincription);
        return $this->render('pageAccueil.html.twig');
    }
    */

}