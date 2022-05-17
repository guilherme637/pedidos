<?php

namespace App\Build\Pedido;

use App\Domain\Build\Pedido\PedidoBuildInterface;
use App\Domain\Entity\Usuario;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\VO\PedidoVO;

class PedidoBuilder implements PedidoBuildInterface
{
    private Pedido $pedido;
    private PedidoVO $pedidoVO;
    private Usuario $cliente;

    public function __construct()
    {
        $this->pedido = new Pedido();

    }

    public function setUsuario(Usuario $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function setPedidoVO(PedidoVO $pedidoVO, ?Pedido $pedido = null): self
    {
        $this->pedidoVO = $pedidoVO;

        if (!is_null($pedido)) {
            $this->pedido = $pedido;
        }

        return $this;
    }

    public function getPedido(): self
    {
        $this->pedido
            ->setStatusPedido($this->pedidoVO->getStatusPedido())
        ;

        if (!is_null($this->pedidoVO->getId())) {
            $this->pedido->setId($this->pedidoVO->getId());
        }

        return $this;
    }

    public function addUsuario(): self
    {
        $this->pedido->setUsuario($this->cliente);
        $this->cliente->setPedido($this->pedido);

        return $this;
    }

    public function addProdutos(): self
    {
        $this->pedidoVO->getProdutos()->forAll(function (int $index, Produto $produto) {
            $produtoEntity = new Produto();

            if (isset($produto['id'])) {
                $produtoEntity->setId($produto['id']);
            }

            $produtoEntity
                ->setNome($produto['nome'])
                ->setPreco($produto['preco'])
                ->setPedido($this->pedido)
            ;
        });

        return $this;
    }

    public function build(): Pedido
    {
        return $this->pedido;
    }
}