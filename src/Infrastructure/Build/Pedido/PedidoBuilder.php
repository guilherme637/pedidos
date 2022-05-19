<?php

namespace App\Infrastructure\Build\Pedido;

use App\Domain\Build\Pedido\PedidoBuildInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\Domain\Entity\Usuario;

class PedidoBuilder implements PedidoBuildInterface
{
    private Pedido $pedido;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        return $this->pedido = new Pedido();
    }

    public function setId(?int $id): void
    {
        $this->pedido->setId($id);
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->pedido->setUsuario($usuario);
    }

    public function setStatusPedido(string $statusPedido): void
    {
        $this->pedido->setStatusPedido($statusPedido);
    }

    public function setProdutos(Produto $produtos): void
    {
        $this->pedido->setProdutos($produtos);
    }

    public function build(): Pedido
    {
        return $this->pedido;
    }
}