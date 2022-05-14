<?php

namespace App\Controller\Action\Pedido;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Adapter\SerializerInterface;
use App\Domain\Adapter\ValidatorInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\Repository\ClienteRepository;
use App\VO\PedidoVO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CriarPedidoGetAction
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private ClienteRepository $clienteRepository;
    private PersistenceInterface $em;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ClienteRepository $clienteRepository,
        PersistenceInterface $em
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->clienteRepository = $clienteRepository;
        $this->em = $em;
    }

    #[Route('/pedido', name: 'criar_pedido_get_action', methods: ['GET'])]
    public function __invoke(Request $request)
    {
        /** @var PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        $this->validator->validate($pedidoVO);

        $cliente = $this->clienteRepository->find($pedidoVO->getCliente()->getId());

        $pedido = new Pedido();
        $pedido->setCliente($cliente)
            ->setStatusPedido($pedidoVO->getStatusPedido());
        $this->em->persist($pedido);
        $this->em->flush();

        foreach ($pedidoVO->getProdutos()->toArray() as $produto) {
            $produtoEntity = new Produto();
            $produtoEntity->setNome($produto['nome'])->setPreco($produto['preco']);
            $pedido->setProdutos($produtoEntity);
        }

        $produtoEntity->setPedido($pedido);
        $cliente->setPedido($pedido);

        $this->em->persist($produtoEntity);
        $this->em->flush();

        return new JsonResponse(['message' => $pedido], 200);
    }
}