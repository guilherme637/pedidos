<?php

namespace App\Domain\Adapter;

use Doctrine\ORM\EntityManagerInterface;

interface PersistenceInterface
{
    public function persist(object $objeto): void;

    public function flush(): void;

    public function getOrm(): EntityManagerInterface;
}