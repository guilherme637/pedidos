<?php

namespace App\Infrastructure\Controller\Action\Pedido;

use App\Domain\Adapter\{SerializerInterface, ValidatorInterface};
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Build\Pedido\PedidoBuilder;
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

    #[Route('/pedido/editar/{id}')]
    public function __invoke(Request $request): JsonResponse
    {
        /** @var \App\Domain\VO\PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        dd($pedidoVO);
        $this->validator->validate($pedidoVO);

        $this->pedidoService->editarPedido($pedidoVO, new PedidoBuilder());

        return new JsonResponse(['mensagem' => 'ok'], Response::HTTP_OK);
    }
}