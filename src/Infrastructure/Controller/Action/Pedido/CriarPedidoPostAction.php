<?php

namespace App\Infrastructure\Controller\Action\Pedido;

use App\Domain\Adapter\{SerializerInterface, ValidatorInterface};
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Service\PedidoService;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\Routing\Annotation\Route;


class CriarPedidoPostAction
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private PedidoService $pedidoService;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        PedidoService $pedidoService
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->pedidoService = $pedidoService;
    }

    #[Route('/pedido', name: 'criar_pedido_get_action', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        $this->validator->validate($pedidoVO);

        $this->pedidoService->create($pedidoVO);

        return new JsonResponse(['message' => 'ok'], Response::HTTP_CREATED);
    }
}