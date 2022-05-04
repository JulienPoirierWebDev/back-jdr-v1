<?php

namespace App\Controller;


use App\Repository\PlayerCharacterRepository;
use App\Repository\QuestInAdventureRepository;
use App\Repository\VisitedPlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class VisitedPlaceByAdventureController extends AbstractController
{

    public function __construct(private VisitedPlaceRepository $visitedPlaceRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $adventureId =  $data["data"]->getAdventure();

        $result = $this->visitedPlaceRepository->findBy(["adventure" => $adventureId]);

        if($result) {
            return $result;
        }
        else {
            return ["No result"];
        }
    }
}