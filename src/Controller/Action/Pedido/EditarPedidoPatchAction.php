<?php

namespace App\Controller\Action\Pedido;

use App\Build\Pedido\PedidoBuilder;
use App\Domain\Adapter\SerializerInterface;
use App\Domain\Adapter\ValidatorInterface;
use App\Service\PedidoService;
use App\VO\PedidoVO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
        /** @var PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        $this->validator->validate($pedidoVO);

        $this->pedidoService->editarPedido($pedidoVO, new PedidoBuilder());

        return new JsonResponse('Ok', 200);
    }
}