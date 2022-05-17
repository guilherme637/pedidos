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

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getRoles(): array
    {
        $this->role[] = 'ROLE_CLIENTE';
        $this->role[] = 'ROLE_LOJA';

        return array_unique($this->role);
    }

    public function setRole(string $role): self
    {
        $this->role[] = $role;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
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

    public function setIsAtivo(bool $isAtivo): self
    {
        $this->isAtivo = $isAtivo;

        return $this;
    }
}