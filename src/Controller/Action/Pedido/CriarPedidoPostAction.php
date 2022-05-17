<?php

namespace App\Controller\Action\Pedido;

use App\Build\Pedido\PedidoBuilder;
use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Adapter\SerializerInterface;
use App\Domain\Adapter\ValidatorInterface;
use App\Repository\UsuarioRepository;
use App\Service\PedidoService;
use App\VO\PedidoVO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CriarPedidoPostAction
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private UsuarioRepository $usuarioRepository;
    private PersistenceInterface $em;
    private PedidoService $pedidoService;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        UsuarioRepository $usuarioRepository,
        PersistenceInterface $em,
        PedidoService $pedidoService
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->usuarioRepository = $usuarioRepository;
        $this->em = $em;
        $this->pedidoService = $pedidoService;
    }

    #[Route('/pedido', name: 'criar_pedido_get_action', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        /** @var PedidoVO $pedidoVO */
        $pedidoVO = $this->serializer->deserialize($request->getContent(), PedidoVO::class, 'json');
        $this->validator->validate($pedidoVO);

        $cliente = $this->usuarioRepository->find($pedidoVO->getUsuario());
        $this->pedidoService->criarPedido($pedidoVO, $cliente, new PedidoBuilder());
//        $pedido = new Pedido();
//        $pedido->setCliente($cliente)
//            ->setStatusPedido($pedidoVO->getStatusPedido());
//        $this->em->persist($pedido);
//        $this->em->flush();
//
//        foreach ($pedidoVO->getProdutos()->toArray() as $produto) {
//            $produtoEntity = new Produto();
//            $produtoEntity->setNome($produto['nome'])->setPreco($produto['preco']);
//            $pedido->setProdutos($produtoEntity);
//        }
//
//        $produtoEntity->setPedido($pedido);
//        $cliente->setPedido($pedido);
//
//        $this->em->persist($produtoEntity);
//        $this->em->flush();

//        return new JsonResponse(['message' => $pedido], 200);
    }
}