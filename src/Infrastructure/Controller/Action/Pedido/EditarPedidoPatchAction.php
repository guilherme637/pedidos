<?php

namespace App\Infrastructure\Controller\Action\Pedido;

use App\Infrastructure\PedidoConverter;
use App\Domain\Adapter\{SerializerInterface, ValidatorInterface};
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Service\PedidoService;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\Routing\Annotation\Route;

class EditarPedidoPatchAction
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

    #[Route('/pedido/editar')]
    public function __invoke(Request $request): JsonResponse
    {
        /** @var PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        $this->validator->validate($pedidoVO);

        $this->pedidoService->editarPedido($pedidoVO, new PedidoConverter());

        return new JsonResponse(['mensagem' => 'ok'], Response::HTTP_OK);
    }
}