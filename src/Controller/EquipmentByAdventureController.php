<?php

namespace App\Controller;


use App\Repository\PlayerCharacterRepository;
use App\Repository\QuestInAdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EquipmentByAdventureController extends AbstractController
{

    public function __construct(private QuestInAdventureRepository $questInAdventureRepository) {

    }

    public function __invoke( Request $request): array
    {


        $data = $request->attributes->all();
        $adventureId =  $data["data"]->getAdventure();

        $result = $this->questInAdventureRepository->findBy(["adventure" => $adventureId]);

        return $result;
    }
}