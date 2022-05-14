<?php

namespace App\Domain\Entity;

class Produto
{
    private ?int $id;

    private string $nome;

    private float $preco;

    private Pedido $pedido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getPedido(): Pedido
    {
        return $this->pedido;
    }

    public function setPedido(Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }
}