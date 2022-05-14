<?php

namespace App\Build;

use App\Domain\Build\BuildInterface;
use App\Domain\Build\Cliente\ClienteBuildInterface;
use App\Domain\Entity\Cliente;
use App\VO\ClienteVO;

class ClienteBuilder implements ClienteBuildInterface
{
    private Cliente $cliente;
    private ClienteVO $clienteVO;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function setClienteVO(ClienteVO $clienteVO): self
    {
        $this->clienteVO = $clienteVO;

        return $this;
    }

    public function getCliente(): self
    {
        $this->cliente->setEmail($this->clienteVO->getEmail());
        $this->cliente->setNome($this->clienteVO->getNome());
        $this->cliente->setTelefone($this->clienteVO->getTelefone());

        return $this;
    }

    public function build(): Cliente
    {
        return $this->cliente;
    }
}