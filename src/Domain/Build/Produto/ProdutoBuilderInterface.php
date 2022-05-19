<?php

namespace App\Domain\Build\Produto;

use App\Domain\Entity\Pedido;

interface ProdutoBuilderInterface
{
    public function setId(?int $id): void;

    public function setNome(string $nome): void;

    public function setPreco(float $preco): void;

    public function setPedido(Pedido $pedido): void;

}