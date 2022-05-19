<?php

namespace App\Infrastructure\Build\Produto;

use App\Domain\Build\Produto\ProdutoBuilderInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;

class ProdutoBuilder implements ProdutoBuilderInterface
{
    private Produto $produto;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->produto = new Produto();
    }

    public function setId(?int $id): void
    {
        $this->produto->setId($id);
    }

    public function setNome(string $nome): void
    {
        $this->produto->setNome($nome);
    }

    public function setPreco(float $preco): void
    {
        $this->produto->setPreco($preco);
    }

    public function setPedido(Pedido $pedido): void
    {
        $this->produto->setPedido($pedido);
    }

    public function build(): Produto
    {
        return $this->produto;
    }
}