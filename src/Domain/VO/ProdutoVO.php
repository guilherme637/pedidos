<?php

namespace App\Domain\VO;

class ProdutoVO
{
    public function __construct(
        private ?int $id,
        private string $nome,
        private float $preco,
        private PedidoVO $pedido
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPedido(): PedidoVO
    {
        return $this->pedido;
    }
}