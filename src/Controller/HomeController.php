<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        return $this->render('serie/index.html.twig', ['lesHackathons' => $products]);        
    }
}