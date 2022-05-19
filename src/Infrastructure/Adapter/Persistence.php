<?php

namespace App\Infrastructure\Adapter;

use App\Domain\Adapter\PersistenceInterface;
use Doctrine\ORM\EntityManagerInterface;

class Persistence implements PersistenceInterface
{
    public function __construct(private EntityManagerInterface $manager) {}

    public function persist(object $objeto): void
    {
        $this->manager->persist($objeto);
    }

    public function flush(): void
    {
        $this->manager->flush();
    }

    public function getOrm(): EntityManagerInterface
    {
        return $this->manager;
    }
}