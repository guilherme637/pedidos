<?php

namespace App\Infrastructure\Build\Director;

use App\Domain\Build\Director\Produto\ProdutoDirectorInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\Domain\VO\ProdutoVO;
use App\Infrastructure\Build\Produto\ProdutoBuilder;

class ProdutoDirector implements ProdutoDirectorInterface
{
    public function buildParameterAsVO(ProdutoVO $produtoVO, Pedido $pedido): Produto
    {
        $produtoBuilder = new ProdutoBuilder();

        $produtoBuilder->setNome($produtoVO->getNome());
        $produtoBuilder->setPreco($produtoVO->getPreco());
        $produtoBuilder->setPedido($pedido);

        return $produtoBuilder->build();
    }

    public function buildParameterAsArray(array $produtoVO, Pedido $pedido): Produto
    {
        $produtoBuilder = new ProdutoBuilder();

        $produtoBuilder->setNome($produtoVO['nome']);
        $produtoBuilder->setPreco($produtoVO['preco']);
        $produtoBuilder->setPedido($pedido);

        return $produtoBuilder->build();
    }
}