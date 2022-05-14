<?php

namespace App\VO;

use App\Domain\Entity\Cliente;

class EnderecoVO
{
    public function __construct(
        private ?int $id,
        private string $rua,
        private int $numero,
        private int $cep,
        private Cliente $cliente
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getCep(): int
    {
        return $this->cep;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }
}