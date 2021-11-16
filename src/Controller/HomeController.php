<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Repository\HackathonRespositorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/hackathon", name="home")
     */
    /*public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $ville = $repository->getUneVille();
        return $this->render('listeHackathon.html.twig', ['lesHackathons' => $products, "lesVilles" =>$ville]);        
    }

    /**
     * @Route("/hackathon/{id}", name="hackathon")
     */
        public function getLeHackathon($id)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $product = $repository->find($id);
        return $this->render('unHackathon.html.twig', ["unHackathon" =>$product]);
     }


     /**
     * @Route("/hackathon/{ville}", name="hackathon")
     */
    /*public function getLaVille($ville)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $product = $repository->find($ville);
        return $this->render('unHackathon.html.twig', ["lesVilles" =>$product]);
     }*/

}