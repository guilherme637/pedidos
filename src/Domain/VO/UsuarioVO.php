<?php

namespace App\Domain\VO;

class UsuarioVO
{
    public function __construct(
        private ?int $id,
        private string $nome,
        private string $email,
        private string $password,
        private string $role,
        private bool $isAtivo,
        private string $telefone,
        private ?EnderecoVO $endereco
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getEndereco(): EnderecoVO
    {
        return $this->endereco;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function isAtivo(): bool
    {
        return $this->isAtivo;
    }
}