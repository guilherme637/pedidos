<?php

namespace App\Service;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Build\Pedido\PedidoBuildInterface;
use App\Domain\Entity\Pedido;
use App\Domain\Entity\Produto;
use App\Domain\Entity\Usuario;
use App\Repository\PedidoRepository;
use App\Repository\ProdutoRepository;
use App\VO\PedidoVO;

class PedidoService
{
    private PersistenceInterface $persistence;
    private PedidoRepository $pedidoRepository;
    private ProdutoRepository $produtoRepository;

    public function __construct(
        PersistenceInterface $persistence,
        PedidoRepository $pedidoRepository,
        ProdutoRepository $produtoRepository
    ) {
        $this->persistence = $persistence;
        $this->pedidoRepository = $pedidoRepository;
        $this->produtoRepository = $produtoRepository;
    }

    public function criarPedido(PedidoVO $pedidoVO, Usuario $usuario, PedidoBuildInterface $pedidoBuild)
    {
        $pedido = $pedidoBuild
            ->setPedidoVO($pedidoVO)
            ->setUsuario($usuario)
            ->getPedido()
            ->addUsuario()
            ->addProdutos()
            ->build()
        ;

        $this->persistence->persist($pedido);
        $this->persistence->flush();
    }

    public function editarPedido(PedidoVO $pedidoVO, PedidoBuildInterface $pedidoBuild)
    {
        /** @var Pedido $pedidoBanco */
        $pedidoBanco = $this->pedidoRepository->findById($pedidoVO->getId());

        $pedido = $pedidoBuild
            ->setPedidoVO($pedidoVO, $pedidoBanco)
            ->getPedido()
            ->build()
        ;


        $pedidoVO->getProdutos()->forAll(function (int $indexVO, array $produtoVO) use ($pedido) {
            $produto = $this->produtoRepository->findById($produtoVO['id']);

             $produtoPatch = $produto
                ->setNome($produtoVO['nome'])
                ->setPreco($produtoVO['preco'])
             ;

             $pedido->getProdutos()->add($produtoPatch);
             return $produtoPatch;
        });

        $this->persistence->flush();
    }
}