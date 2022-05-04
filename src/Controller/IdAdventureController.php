<?php

namespace App\Controller;

use App\Repository\AdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IdAdventureController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $slug = $data["data"]->getSlug();

        $result = $this->adventureRepository->findBy(["slug" => $slug]);

        return $result;
    }
}