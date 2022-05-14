<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Pedido
{
    private ?int $id;

    private Cliente $cliente;

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

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
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

    public function setStatusPedido(string $statusPedido): self
    {
        $this->statusPedido = $statusPedido;

        return $this;
    }

    public function getProdutos(): ArrayCollection
    {
        return $this->produtos;
    }

    public function setProdutos(Produto $produtos): self
    {
        $this->produtos->add($produtos);

        return $this;
    }
}