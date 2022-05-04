<?php

namespace App\Controller;

use App\Repository\AdventureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CheckAdventureController extends AbstractController
{

    public function __construct(private AdventureRepository $adventureRepository) {

    }

    public function __invoke( Request $request): array
    {
        $data = $request->attributes->all();
        $slug = $data["data"]->getSlug();

        $test = $this->adventureRepository->findBy(["slug" => $slug]);
        if(count($test) > 0){
            $result =
                ["title_test" => true];
        } else
        {
            $result = ["title_test" => false];
        }
        return $result;
    }
}