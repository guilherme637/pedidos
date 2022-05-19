<?php

namespace App\Infrastructure\Build\Usuario;

use App\Domain\Build\Usuario\UsuarioBuilderInterface;
use App\Domain\Entity\Endereco;
use App\Domain\Entity\Usuario;

class UsuarioBuilder implements UsuarioBuilderInterface
{
    private Usuario $usuario;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->usuario = new Usuario();
    }

    public function setNome(string $nome): void
    {
        $this->usuario->setNome($nome);
    }

    public function setEmail(string $email): void
    {
        $this->usuario->setEmail($email);
    }

    public function setTelefone(string $telefone): void
    {
        $this->usuario->setTelefone($telefone);
    }

    public function setRole(string $role): void
    {
        $this->usuario->setRole($role);
    }

    public function setPassword(string $password): void
    {
        $this->usuario->setPassword($password);
    }

    public function setIsAtivo(bool $isAtivo): void
    {
        $this->usuario->setIsAtivo($isAtivo);
    }

    public function setEndereco(Endereco $endereco): void
    {
        $this->usuario->setEndereco($endereco);
    }

    public function build(): Usuario
    {
        return $this->usuario;
    }
}