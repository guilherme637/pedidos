<?php

namespace App\Domain\Build\Director\Produto;

use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\Domain\VO\ProdutoVO;

interface ProdutoDirectorInterface
{
    public function buildParameterAsVO(ProdutoVO $produtoVO, Pedido $pedido): Produto;

    public function buildParameterAsArray(array $produtoVO, Pedido $pedido): Produto;
}