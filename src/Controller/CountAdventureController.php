<?php

namespace App\Controller;

use App\Repository\AdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CountAdventureController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $user = $data["data"]->getUser();


        $test = $this->adventureRepository->findBy(["user" => $user]);
        if(count($test) > 3){
            $result =
                ["adventureSup3" => true];
        } else
        {
            $result = ["adventureSup3" => false];
        }
        return [$result];
    }
}