<?php

namespace App\Controller\Action\Pedido;

use App\Build\Pedido\PedidoBuilder;
use App\Service\PedidoService;
use App\VO\PedidoVO;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Request, JsonResponse, Response};
use App\Domain\Adapter\{ValidatorInterface, SerializerInterface};


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

        $this->pedidoService->criarPedido($pedidoVO, new PedidoBuilder());

        return new JsonResponse(['message' => 'ok'], Response::HTTP_OK);
    }
}