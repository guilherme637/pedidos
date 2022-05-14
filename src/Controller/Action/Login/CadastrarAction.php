<?php

namespace App\Controller\Action\Login;

use App\Domain\Adapter\SerializerInterface;
use App\Domain\Build\Cliente\ClienteBuildInterface;
use App\Service\ClienteService;
use App\VO\ClienteVO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \App\Domain\Adapter\ValidatorInterface;

class CadastrarAction
{
    private ValidatorInterface $validator;
    private ClienteService $clienteService;
    private ClienteBuildInterface $clienteBuild;
    private SerializerInterface $serializer;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ClienteService $clienteService,
        ClienteBuildInterface $clienteBuild
    ) {
        $this->validator = $validator;
        $this->clienteService = $clienteService;
        $this->clienteBuild = $clienteBuild;
        $this->serializer = $serializer;
    }

    #[Route('/cadastro', name: 'cadastrar_action_post', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var ClienteVO $clientVO */
        $clientVO = $this->serializer->deserialize($request->getContent(), ClienteVO::class, 'json');
        $this->validator->validate($clientVO);

        $this->clienteService->createCadastro($this->clienteBuild, $clientVO);

        return new JsonResponse('ok', 200);
    }
}