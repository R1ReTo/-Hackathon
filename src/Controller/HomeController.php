<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/hackathon", name="home")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        return $this->render('listeHackathon.html.twig', ['lesHackathons' => $products]);        
    }

    /**
     * @Route("/hackathon/{id}", name="hackathon")
     */
        public function getLaSerie($id)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $product = $repository->find($id);
        return $this->render('unHackathon.html.twig', ["unHackathon" =>$product]);
     }

}