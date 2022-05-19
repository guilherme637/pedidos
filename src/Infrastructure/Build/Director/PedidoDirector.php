<?php

namespace App\Infrastructure\Build\Director;

use App\Domain\Build\Director\Pedido\PedidoDirectorInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Usuario;
use App\Domain\VO\PedidoVO;
use App\Infrastructure\Build\Pedido\PedidoBuilder;

class PedidoDirector implements PedidoDirectorInterface
{
    public function build(PedidoVO $pedidoVO, Usuario $usuario): Pedido
    {
        $pedidoBuilder = new PedidoBuilder();

        $pedidoBuilder->setUsuario($usuario);
        $pedidoBuilder->setStatusPedido($pedidoVO->getStatusPedido());

        $pedidoVO->getProdutos()->forAll(function (int $index, array $produto) use ($pedidoBuilder) {
            $produtoDirector = new ProdutoDirector();
            $produto = $produtoDirector->buildParameterAsArray($produto, $pedidoBuilder->build());

            $pedidoBuilder->setProdutos($produto);

            return $produto;
        });

        return $pedidoBuilder->build();
    }
}