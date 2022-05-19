<?php

namespace App\Infrastructure\Controller\Action\Login;

use App\Domain\Adapter\{SerializerInterface, ValidatorInterface};
use App\Domain\VO\UsuarioVO;
use App\Infrastructure\Service\UsuarioService;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\Routing\Annotation\Route;

class CadastrarAction
{
    private ValidatorInterface $validator;
    private UsuarioService $usuarioService;
    private SerializerInterface $serializer;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        UsuarioService $usuarioService
    ) {
        $this->validator = $validator;
        $this->usuarioService = $usuarioService;
        $this->serializer = $serializer;
    }

    #[Route('/cadastro', name: 'cadastrar_action_post', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var \App\Domain\VO\\App\Domain\VO\\App\VO\\App\VO\UsuarioVO $usuarioVO */
        $usuarioVO = $this->serializer->deserialize($request->getContent(), UsuarioVO::class, 'json');
        $this->validator->validate($usuarioVO);

        $this->usuarioService->create($usuarioVO);

        return new JsonResponse(['message' => 'ok'], Response::HTTP_CREATED);
    }
}