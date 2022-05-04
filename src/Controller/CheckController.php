<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CheckController extends AbstractController
{

    public function __construct(private UserRepository $userRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $email = $data["data"]->getemail();

        $test = $this->userRepository->findBy(["email" => $email]);
        if(count($test) > 0){
            $result =
                ["emailtest" => true];
        } else
        {
            $result = ["emailtest" => false];
        }
        return $result;
    }
}