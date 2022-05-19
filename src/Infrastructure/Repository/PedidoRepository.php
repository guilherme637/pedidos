<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Pedido;
use App\Infrastructure\Adapter\Repository;
use Doctrine\ORM\EntityManagerInterface;

class PedidoRepository extends Repository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Pedido::class);
    }

    public function listarTodos(int $usuarioID): array
    {
        $pedidos = $this->createQueryBuilder('p')
            ->select('
            pd.id as pedidoId,
            pd.statusPedido,
            pd.dataCriacao,
            pdt.id as produtoId,
            pdt.nome,
            pdt.preco
            ')
            ->distinct()
            ->from('App:Pedido', 'pd')
            ->join('pd.produtos', 'pdt')
            ->innerJoin('pd.usuario', 'u')
            ->where('u.id = :id')
            ->setParameter('id', $usuarioID)
            ->getQuery()
            ->getResult()
        ;

        return empty($pedidos) ? [] : $pedidos;
    }
}