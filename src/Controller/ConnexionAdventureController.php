<?php

namespace App\Controller;

use App\Repository\AdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ConnexionAdventureController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $slugRequest = $data["data"]->getSlug();
        $passwordRequest = $data["data"]->getPassword();
        $adventureToTest = $this->adventureRepository->findOneBy(["slug" => $slugRequest]);
        $passwordToTest = $adventureToTest->getPassword();
        $id = $adventureToTest->getId();

        if ($passwordToTest === $passwordRequest ){
            $result = ["connexion" => true];
        } else {
            $result = ["connexion" => false, "adventure_id" => $id];

        }

        return $result;
    }
}