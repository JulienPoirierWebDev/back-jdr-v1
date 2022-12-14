<?php

namespace App\OpenApi;

use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\Model\PathItem;
use ApiPlatform\Core\OpenApi\Model\RequestBody;
use ApiPlatform\Core\OpenApi\OpenApi;
use Symfony\Flex\Unpack\Operation;

class OpenApiFactory implements OpenApiFactoryInterface
{
    public function __construct (private OpenApiFactoryInterface $decorated){
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);
        /** @var PathItem $path */
        foreach($openApi->getPaths()->getPaths() as $key => $path) {
            if($path->getGet() && $path->getGet()->getSummary() === 'hidden') {
                $openApi->getPaths()->addPath($key,$path->withGet(null));
            }
        }

        $schemas = $openApi->getComponents()->getSecuritySchemes();
        $schemas['bearerAuth'] = new \ArrayObject([
            'type' => 'http',
            'scheme' => 'bearer',
            'bearerFormat' => 'JWT'
        ]);

        $schemas = $openApi->getComponents()->getSchemas();
        $schemas['Credentials'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'username'=> [
                'type'=>'string',
                'example'=>"john@doe.fr",
            ],
            'password'=> [
                'type'=>'string',
                'example'=>'0000'
                ]
            ]
        ]);
        $schemas['Token'] = new \ArrayObject([
            'type' => 'object',
            'properties' => [
                'token'=> [
                    'type'=>'string',
                    'readOnly' => true,
                    ]
            ]
        ]);

        $meOperation = $openApi->getPaths()->getPath("/api/me")->getGet()->withParameters([]);
        $mePathItem = $openApi->getPaths()->getPath('/api/me')->withGet($meOperation);
        $openApi->getPaths()->addPath('/api/me', $mePathItem);

        $checkOperation = $openApi->getPaths()->getPath("/api/check")->getPost()->withParameters(["email"]);
        $checkPathItem = $openApi->getPaths()->getPath('/api/check')->withPost($checkOperation);
        $openApi->getPaths()->addPath('/api/check', $checkPathItem);

        $adventuresCheckOperation = $openApi->getPaths()->getPath("/api/adventures/check")->getPost()->withParameters(["slug"]);
        $adventureCheckPathItem = $openApi->getPaths()->getPath('/api/adventures/check')->withPost($adventuresCheckOperation);
        $openApi->getPaths()->addPath('/api/adventures/check', $adventureCheckPathItem);

        $adventuresCountOperation = $openApi->getPaths()->getPath("/api/adventures/count")->getPost()->withParameters(["user_id"]);
        $adventureCountPathItem = $openApi->getPaths()->getPath('/api/adventures/count')->withPost($adventuresCountOperation);
        $openApi->getPaths()->addPath('/api/adventures/count', $adventureCountPathItem);

        return $openApi;
    }
}