<?php

namespace App\Domain\Build\Pedido;

use App\Domain\Build\BuildInterface;
use App\Domain\Entity\Usuario;
use App\Domain\Entity\Pedido;
use App\VO\PedidoVO;

interface PedidoBuildInterface extends BuildInterface
{
    public function setPedidoVO(PedidoVO $pedidoVO, ?Pedido $pedido = null): self;

    public function setUsuario(Usuario $usuario): self;

    public function getPedido(): self;

    public function addUsuario(): self;

    public function addProdutos(): self;

    public function build(): Pedido;
}