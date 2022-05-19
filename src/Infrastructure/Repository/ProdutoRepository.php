<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Produto;
use App\Infrastructure\Adapter\Repository;
use Doctrine\ORM\EntityManagerInterface;

class ProdutoRepository extends Repository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Produto::class);
    }
}