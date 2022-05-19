<?php

namespace App\Domain\Build\Usuario;

use App\Domain\Build\BuildInterface;
use App\Domain\Entity\Endereco;

interface UsuarioBuilderInterface extends BuildInterface
{
    public function setNome(string $nome): void;

    public function setEmail(string $email): void;

    public function setTelefone(string $telefone): void;

    public function setRole(string $role): void;

    public function setPassword(string $password): void;

    public function setIsAtivo(bool $isAtivo): void;

    public function setEndereco(Endereco $endereco): void;
}