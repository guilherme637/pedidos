<?php

namespace App\Domain\Build\Cliente;

use App\Domain\Build\BuildInterface;
use App\VO\ClienteVO;

interface ClienteBuildInterface extends BuildInterface
{
    public function setClienteVO(ClienteVO $clienteVO): self;
    public function getCliente(): self;
}