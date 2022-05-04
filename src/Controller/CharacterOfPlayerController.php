<?php

namespace App\Controller;


use App\Entity\PlayerCharacter;
use App\Repository\AdventureRepository;
use App\Repository\PlayerCharacterRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CharacterOfPlayerController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( PlayerCharacter $data) : PlayerCharacter
    {
        $data;

        return $data;
    }
}