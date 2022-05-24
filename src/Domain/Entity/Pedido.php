<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Pedido
{
    private ?int $id;

    private Usuario $usuario;

    private \DateTime $dataCriacao;

    private string $statusPedido;

    private Collection $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getDataCriacao(): \DateTime
    {
        return $this->dataCriacao;
    }

    public function setDataCriacao(): void
    {
        $this->dataCriacao = new \DateTime();
    }

    public function getStatusPedido(): string
    {
        return $this->statusPedido;
    }

    public function setStatusPedido(string $statusPedido): void
    {
        $this->statusPedido = $statusPedido;
    }

    public function getProdutos(): Collection
    {
        return $this->produtos;
    }

    public function setProdutos(Produto $produtos): void
    {
        $this->produtos->add($produtos);
    }
}