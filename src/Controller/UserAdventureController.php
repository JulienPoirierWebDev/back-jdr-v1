<?php

namespace App\Controller;

use App\Repository\AdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserAdventureController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->query->all();
        $user = $data;


        $test = $this->adventureRepository->findBy(["user" => $user]);

        return [$test];
    }
}