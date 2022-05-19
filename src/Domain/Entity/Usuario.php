<?php

namespace App\Domain\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method string getUserIdentifier()
 */
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{
    private ?int $id;
    private string $nome;
    private string $email;
    private string $password;
    private array $role;
    private string $telefone;
    private bool $isAtivo;
    private Endereco $endereco;
    private ?Pedido $pedido;

    public function __construct()
    {
        $this->role = [];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): void
    {
        $this->pedido = $pedido;
    }

    public function getRoles(): array
    {
        $this->role[] = 'ROLE_CLIENTE';
        $this->role[] = 'ROLE_LOJA';

        return array_unique($this->role);
    }

    public function setRole(string $role): void
    {
        $this->role[] = $role;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function isAtivo(): bool
    {
        return $this->isAtivo;
    }

    public function setIsAtivo(bool $isAtivo): void
    {
        $this->isAtivo = $isAtivo;
    }
}