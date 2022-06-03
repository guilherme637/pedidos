<?php

namespace App\Infrastructure;

use App\Domain\Entity\Pedido;
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Repository\ProdutoRepository;
use Doctrine\Common\Collections\ArrayCollection;

class PedidoConverter
{
    public function convertePedidoUnionPedidoVO(
        Pedido $pedido,
        PedidoVO $pedidoVO,
        ProdutoRepository $produtoRepository
    ): Pedido {
        $pedido->setStatusPedido($pedidoVO->getStatusPedido());

        $pedidoVO->getProdutos()->forAll(function (int $indexVO, array $produtoVO) use ($pedido, $produtoRepository) {
            $produto = $produtoRepository->findById($produtoVO['id']);

            $produto->setNome($produtoVO['nome']);
            $produto->setPreco($produtoVO['preco']);
            $pedido->getProdutos()->add($produto);

            return $produto;
        });

        return $pedido;
    }

    public function convertePedidoArrayToPedidoVO(array $pedidos): ArrayCollection
    {
        $arrayCollection = new ArrayCollection();

        /** @var Pedido $pedido */
        foreach ($pedidos as $pedido) {
            $pedidoVO = new PedidoVO(
                $pedido->getId(),
                $pedido->getUsuario()->getId(),
                $pedido->getDataCriacao(),
                $pedido->getStatusPedido(),
                $pedido->getProdutos()
            );

            $arrayCollection->add($pedidoVO);
        }

        return $arrayCollection;
    }
}