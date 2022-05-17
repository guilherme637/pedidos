<?php

namespace App\Adapter;

use App\Domain\Adapter\RepositoryInterface;
use App\Domain\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

abstract class Repository extends EntityRepository implements RepositoryInterface
{
    public function __construct(EntityManagerInterface $em, string $class)
    {
        parent::__construct($em, new ClassMetadata($class));
    }

    public function getfindAll()
    {
        return $this->findAll();
    }

    public function findById(int $id)
    {
        return $this->find($id);
    }

    public function getfindBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function getfindOneBy(array $criteria, ?array $orderBy = null)
    {
        return $this->findOneBy($criteria, $orderBy);
    }

    public function getEM(): EntityManagerInterface
    {
        return $this->_em;
    }

    public function getUsuario(int $usuarioId): Usuario
    {
        return $this->getEM()->getRepository(Usuario::class)->find($usuarioId);
    }
}