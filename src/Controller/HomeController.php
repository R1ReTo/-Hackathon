<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Favoris;
use App\Entity\Hackathon;
use App\Entity\Inscription;
use App\Entity\Participant;
use App\Form\InscriptionType;
use App\Form\CommentaireType;
use App\Repository\HackathonRepository;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function detailHackathon($id, Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->find($id);
        $repository = $this->getDoctrine()->getRepository(Commentaire::class);
        $commentaire = new Commentaire;
        $lesCommentaire = $repository->findBy(['idhackathon' => $id]);
        $form=$this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        $uneDate = new \DateTime(date($format = 'Y-m-d'));
        $commentaire->setDatecom($uneDate);
        $commentaire->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        if ($form->isSubmitted() == true)
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('listeHackathon');
        }

        
        return $this->render('detailHackathon.html.twig', ['unHackathon' => $hackathon, 'lesCommentaires' => $lesCommentaire, 'form'=>$form->createView()]);
    }


    /**
     * @Route("/hackathon/update/{id}", name="updateHackathon")
     */
    public function updateHackathon($id, HackathonRepository $hackathonRepository)
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $products = $repository->findAll();
        $lesVilles = $hackathonRepository->selectville();
        $participant = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $inscription = new Inscription;
        $hackathon = $repository->find($id);
        $uneDate = new \DateTime(date($format = 'Y-m-d'));
        $nbplace = $hackathon->getNbplaces();
        $error = '';
        
        
        if($nbplace <= 0){

            $error ="erreur";
        }
        elseif($hackathon->getDatelimite() <= $uneDate){
        

            $error ="erreur2";
        }
        else{ 
        $hackathon->setNbplaces($hackathon->getNbplaces()-1);
        $em=$this->getDoctrine()->getManager();
        $em->persist($hackathon);
        dump($hackathon->getIdhackathon());
        $inscription->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
        $inscription->setIdparticipant($participant);
        $inscription->setDateincription($uneDate);
        $em->persist($inscription);
        $em->flush();
            
        
        }
        return $this->render('listeHackathon.html.twig', ['error'=>$error, 'lesHackathons' => $products, 'lesVilles' => $lesVilles]);
         
    }

     /**
     * @Route("/listeHackathon/{id}/favoris", name="hackathonFavoris")
     */

    public function favoris($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $leFavori = $repository->findOneBy(['idhackathon' => $id, 'idparticipant' => $this->getUser()]);
        dump(is_null($leFavori));
        if (is_null($leFavori) == true) {
            $favoris = new Favoris;
            $favoris->setIdhackathon($this->getDoctrine()->getRepository(Hackathon::class)->find($id));
            $favoris->setIdparticipant($this->getUser());
            dump($favoris);
            $em = $this->getDoctrine()->getManager();
            $em->persist($favoris);
           
        }
        else{
            $repository = $this->getDoctrine()->getRepository(Favoris::class);
            $leFavori = $repository->findOneBy(['idhackathon' => $id, 'idparticipant' => $this->getUser()]);
            $em = $this->getDoctrine()->getManager();
            $em->remove($leFavori);
        
        }
        $em->flush();
        return $this->redirectToRoute('listeHackathon');
    }


}
