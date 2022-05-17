<?php

namespace App\Repository;

use App\Adapter\Repository;
use App\Domain\Entity\Produto;
use Doctrine\ORM\EntityManagerInterface;

class ProdutoRepository extends Repository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Produto::class);
    }
}