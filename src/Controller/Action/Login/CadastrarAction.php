<?php

namespace App\Controller\Action\Login;

use App\Domain\Adapter\SerializerInterface;
use App\Domain\Build\Usuario\UsuarioBuildInterface;
use App\Service\UsuarioService;
use App\VO\UsuarioVO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \App\Domain\Adapter\ValidatorInterface;

class CadastrarAction
{
    private ValidatorInterface $validator;
    private UsuarioService $usuarioService;
    private UsuarioBuildInterface $usuarioBuild;
    private SerializerInterface $serializer;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        UsuarioService $usuarioService,
        UsuarioBuildInterface $usuarioBuild
    ) {
        $this->validator = $validator;
        $this->usuarioService = $usuarioService;
        $this->usuarioBuild = $usuarioBuild;
        $this->serializer = $serializer;
    }

    #[Route('/cadastro', name: 'cadastrar_action_post', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var UsuarioVO $usuarioVO */
        $usuarioVO = $this->serializer->deserialize($request->getContent(), UsuarioVO::class, 'json');
        $this->validator->validate($usuarioVO);

        $this->usuarioService->createCadastro($this->usuarioBuild, $usuarioVO);

        return new JsonResponse('ok', 200);
    }
}