<?php

namespace App\Repository;

use App\Domain\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UsuarioRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, new ClassMetadata(Usuario::class));
    }

    public function existeEmailCadastrado(string $email): ?string
    {
        $email = $this->_em->createQueryBuilder()
            ->select('c.email')
            ->from('App:Usuario', 'c')
            ->where('c.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult()
        ;

        if (empty($email)) {
            return null;
        }

        return current($email)['email'];
    }

    public function existeTelefoneCadastrado(string $telefone): ?string
    {
        $telefone = $this->_em->createQueryBuilder()
            ->select('c.telefone')
            ->from('App:Usuario', 'c')
            ->where('c.telefone = :telefone')
            ->setParameter('telefone', $telefone)
            ->getQuery()
            ->getResult()
        ;

        if (empty($telefone)) {
            return null;
        }

        return current($telefone)['telefone'];
    }
}