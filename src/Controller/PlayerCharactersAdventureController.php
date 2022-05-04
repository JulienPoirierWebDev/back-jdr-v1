<?php

namespace App\Controller;


use App\Repository\PlayerCharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PlayerCharactersAdventureController extends AbstractController
{

    public function __construct(private PlayerCharacterRepository $playerCharacterRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $adventureId =  $data["data"]->getAdventure();

        $result = $this->playerCharacterRepository->findBy(["adventure" => $adventureId]);

        return $result;
    }
}