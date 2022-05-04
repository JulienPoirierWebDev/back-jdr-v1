<?php

namespace App\Controller;

use App\Entity\User;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HashController extends AbstractController
{

    public function __construct(private UserPasswordHasherInterface $passwordHasher) {

    }

    #[ArrayShape(["hash" => "string"])] public function __invoke(Request $request)
    {
        $user = new User();
        $data = $request->attributes->all();
        $passwordToHash = $data["data"]->getPassword();
        return ["hash" => $this->passwordHasher->hashPassword($user,$passwordToHash)];
    }
}