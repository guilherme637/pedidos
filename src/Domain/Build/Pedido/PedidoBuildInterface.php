<?php

namespace App\Domain\Build\Pedido;

use App\Domain\Build\BuildInterface;
use App\Domain\Entity\Produto;
use App\Domain\Entity\Usuario;

interface PedidoBuildInterface extends BuildInterface
{
    public function setId(?int $id): void;

    public function setUsuario(Usuario $usuario): void;

    public function setStatusPedido(string $statusPedido): void;

    public function setProdutos(Produto $produtos): void;

}