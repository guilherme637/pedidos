<?php

namespace App\Controller\Action\Pedido;

use App\Domain\Adapter\SerializerInterface;
use App\Repository\PedidoRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Request, JsonResponse, Response};

class ListarPedidoGetAction
{
    private SerializerInterface $serializer;
    private PedidoRepository $pedidoRepository;

    public function __construct(SerializerInterface $serializer, PedidoRepository $pedidoRepository)
    {
        $this->serializer = $serializer;
        $this->pedidoRepository = $pedidoRepository;
    }

    #[Route('/pedidos', name: 'listar_pedidos_action', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $pedidos = $this->pedidoRepository->listarTodos($request->get('id'));

        return new JsonResponse(['pedidos' => $pedidos], Response::HTTP_OK);
    }
}