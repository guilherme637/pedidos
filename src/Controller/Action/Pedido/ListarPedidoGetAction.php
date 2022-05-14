<?php

namespace App\Controller\Action\Pedido;

use App\Domain\Adapter\SerializerInterface;
use App\Domain\Entity\Cliente;
use App\Domain\Entity\Pedido;
use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function __invoke()
    {
        /** @var Pedido $teste */
        $pedidoBanco = new ArrayCollection($this->pedidoRepository->getfindAll());
        $pedido = $pedidoBanco->map(function (Pedido $pedido) {
            $cliente = new Cliente();
            $cliente
                ->setId(null)
                ->setNome(null)
                ->setTelefone(null)
                ->setEmail(null)
                ->setEndereco(null)
                ->setPedido(null)
            ;
            $pedido->setCliente($cliente);
            return $pedido;
        });


        $pedidosJson = $this->serializer->serialize($pedido, 'json');

        return new Response($pedidosJson, 200, ['Content-Type' => 'application/json']);
    }
}