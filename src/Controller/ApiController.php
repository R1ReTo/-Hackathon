<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Initiation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Route("/api/listeAtelier/{idhackathon}", name="listeAtelier")
     */
    public function listeAtelier($idhackathon):Response
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Evenement::class);
        $products = $repository->findBy(['idhackathon' => $idhackathon]);
        $json = $serializer->serialize($products, 'json');
        return new Response($json); 
    }
    
    /**
     * @Route("/api/detailAtelier/{idevenement}", name="detailAtelier")
     */
    public function detailAtelier($idevenement):Response
    {
        $serializer = $this->get('serializer');
        $repository = $this->getDoctrine()->getRepository(Initiation::class);
        $products = $repository->findBy(['idevenement' => $idevenement]);
        $json = $serializer->serialize($products, 'json');
        return new Response($json); 
    }
}
