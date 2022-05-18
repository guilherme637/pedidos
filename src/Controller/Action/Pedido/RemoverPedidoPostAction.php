<?php

namespace App\Controller\Action\Pedido;

use App\Repository\PedidoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoverPedidoPostAction
{
    private PedidoRepository $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    #[Route('/pedido/remove/{id}', name: 'remover_pedido_post', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        $pedido = $this->pedidoRepository->findById($request->get('id'));

        $this->pedidoRepository->getEM()->remove($pedido);
        $this->pedidoRepository->getEM()->flush();

        return new JsonResponse([], Response::HTTP_NOT_FOUND);
    }
}