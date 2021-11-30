<?php

namespace App\Controller;

use App\Entity\Hackathon;
<<<<<<< HEAD
use App\Repository\HackathonRespositorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
=======
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer;
>>>>>>> ef80bb34bc1d1ddaf36d579985249e6f60664826

class HomeController extends AbstractController
{
    /**
<<<<<<< HEAD
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

=======
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
>>>>>>> ef80bb34bc1d1ddaf36d579985249e6f60664826
}