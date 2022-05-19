<?php

namespace App\Domain\Build\Director\Pedido;

use App\Domain\Entity\Pedido;
use App\Domain\Entity\Usuario;
use App\Domain\VO\PedidoVO;

interface PedidoDirectorInterface
{
    public function build(PedidoVO $pedidoVO, Usuario $usuario): Pedido;
}