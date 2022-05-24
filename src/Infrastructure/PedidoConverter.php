<?php

namespace App\Infrastructure;

use App\Domain\Entity\Pedido;
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Repository\ProdutoRepository;

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
}