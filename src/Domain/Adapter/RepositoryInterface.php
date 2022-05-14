<?php

namespace App\Domain\Adapter;

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
}