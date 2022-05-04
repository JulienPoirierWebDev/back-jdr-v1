<?php

namespace App\Controller;


use App\Repository\PlayerCharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CheckPlayerCharactersController extends AbstractController
{

    public function __construct(private PlayerCharacterRepository $playerCharacterRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $userId = $data["data"]->getUser();
        $adventureId =  $data["data"]->getAdventure();

        $test = $this->playerCharacterRepository->findBy(["user" => $userId, "adventure" => $adventureId]);
        if(count($test) > 0){
            $result =
                $test;
        } else
        {
            $result = ["title_test" => false];
        }
        return $result;
    }
}