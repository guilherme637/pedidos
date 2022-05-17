<?php

namespace App\Domain\Adapter;

use App\Domain\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;

interface RepositoryInterface
{
    /**
     * @return array|object[]|void
     */
    public function getfindAll();

    /**
     * @return object|null
     */
    public function findById(int $id);

    /**
     * @return object[]
     */
    public function getfindBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null);

    /**
     * @return object|null
     */
    public function getfindOneBy(array $criteria, ?array $orderBy = null);

    public function getEM(): EntityManagerInterface;

    public function getUsuario(int $usuarioId): Usuario;
}