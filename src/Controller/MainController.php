<?php

namespace App\Controller;

use App\Entity\Tirage;
use App\Repository\GrilleRepository;
use App\Services\FdjService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/', name: 'main')]
class MainController extends AbstractController
{
//    const PRIX_GRILLE = 2.20;

    #[Route('/', name: '_index')]
    public function index(
        GrilleRepository $grilleRepository,
        FdjService       $fdjService         //injection de service
    ): Response
    {
        //calcul du nombre total de grilles jouées par l'utilisateur connecté
        $grillesTot = $grilleRepository->findBy(
            ['joueur' => $this->getUser()]
        );
        $nbTot = count($grillesTot);

        //calcul du nombre de grilles de l'utilisateur connecté
        //dont le tirage n'a pas encore été fait
        $grillesEnCours = $grilleRepository->findBy(
            ['joueur' => $this->getUser(),
             'tirageFait' => false ]
        );
        $nbEnCours = count($grillesEnCours);

        //calcul du montant du prochain tirage
        $montant = $fdjService->calculMontantTirage($grilleRepository);

        return $this->render('main/index.html.twig',
            compact('grillesTot', 'nbTot', 'nbEnCours', 'montant'));

    }

    #[IsGranted('ROLE_USER')]
    #[Route('/tirage', name: '_tirage')]
    public function tirage(
        GrilleRepository $grilleRepository,
        FdjService       $fdjService         //injection de service)
    ): Response {

        $tirage = new Tirage();
        //calcul du montant du prochain tirage
        $tirage->setMntJackpot($fdjService->calculMontantTirage($grilleRepository));
        //$aleatoires = $fdjService->tirage();


        return $this->render('main/tirage.html.twig');

    }
}
