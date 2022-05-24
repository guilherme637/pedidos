<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Entity\Pedido;
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Build\Director\PedidoDirector;
use App\Infrastructure\PedidoConverter;
use App\Infrastructure\Repository\PedidoRepository;
use App\Infrastructure\Repository\ProdutoRepository;

class PedidoService
{
    private PersistenceInterface $persistence;
    private PedidoRepository $pedidoRepository;
    private ProdutoRepository $produtoRepository;

    public function __construct(
        PersistenceInterface $persistence,
        PedidoRepository $pedidoRepository,
        ProdutoRepository $produtoRepository
    ) {
        $this->persistence = $persistence;
        $this->pedidoRepository = $pedidoRepository;
        $this->produtoRepository = $produtoRepository;
    }

    public function create(PedidoVO $pedidoVO): void
    {
        $usuario = $this->pedidoRepository->getUsuario($pedidoVO->getUsuario());

        $pedidoDirector = new PedidoDirector();
        $pedido = $pedidoDirector->build($pedidoVO, $usuario);
        $usuario->setPedido($pedido);

        $this->persistence->persist($pedido);
        $this->persistence->flush();
    }

    public function editarPedido(
        PedidoVO $pedidoVO,
        PedidoConverter $pedidoConverter
    ): void {
        /** @var Pedido $pedidoBanco */
        $pedidoBanco = $this->pedidoRepository->findById($pedidoVO->getId());

        $pedidoConverter->convertePedidoUnionPedidoVO($pedidoBanco, $pedidoVO, $this->produtoRepository);

        $this->persistence->flush();
    }
}