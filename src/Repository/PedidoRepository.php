<?php

namespace App\Repository;

use App\Adapter\Repository;
use App\Domain\Entity\Pedido;
use Doctrine\ORM\EntityManagerInterface;

class PedidoRepository extends Repository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Pedido::class);
    }
}