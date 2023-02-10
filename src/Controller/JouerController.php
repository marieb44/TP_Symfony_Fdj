<?php

namespace App\Controller;

use App\Entity\Grille;
use App\Form\GrilleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/jouer', name: 'jouer')]
class JouerController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/', name: '_index')]
    public function index(
        EntityManagerInterface $em,
        Request                $request
    ): Response
    {
        //Affichage du formulaire permettant de jouer une grille
        //1.créer une instance de l'entité
        $grille = new Grille();
        //initialisation des champs qui ne sont pas saisis
        $grille->setJoueur($this->getUser());
        $grille->setDate(new \Datetime());
        $grille->setTirageFait(false);

        //2.créer une instance du formulaire
        $grilleForm = $this->createForm(GrilleType::class, $grille);
        //4.le controller affiche(1,2,3) ET traite
        $grilleForm->handleRequest($request);
        if ($grilleForm->isSubmitted()) {
            //mise à jour de la date au moment de l'enreg. en base ???
//          $grille->setDate(new \Datetime());
            if ($grilleForm->isValid()) {
                $em->persist($grille);
                $em->flush();
                //Ajout message flash suite à l'insertion en base
//              $this->addFlash('success', 'Idea successfully added !');
                //Redirection vers la page d'accueil personnalisée du joueur
                return $this->redirectToRoute('main_index',);
            }
        }

        //3.envoyer le formulaire au twig
        return $this->render('jouer/index.html.twig', [
            'grilleForm' => $grilleForm
        ]);

    }

}
