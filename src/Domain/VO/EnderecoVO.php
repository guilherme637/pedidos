<?php

namespace App\Domain\VO;

class EnderecoVO
{
    public function __construct(
        private ?int $id,
        private string $rua,
        private int $numero,
        private int $cep,
        private UsuarioVO $usuarioVO
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

    public function getUsuario(): UsuarioVO
    {
        return $this->usuarioVO;
    }
}