<?php

namespace App\Services;

use App\Repository\GrilleRepository;

class FdjService
{
    const PRIX_GRILLE = 2.20;

    public function calculMontantTirage(
        GrilleRepository $grilleRepository
        ): float {

        $grillesTirage = $grilleRepository->findBy(
            ['tirageFait' => false]
        );
        $montant = count($grillesTirage) * self::PRIX_GRILLE;

        return $montant;
    }

    public function tirage (int $min, int $max) {

    }

}