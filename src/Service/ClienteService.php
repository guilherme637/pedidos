<?php

namespace App\Service;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Build\Cliente\ClienteBuildInterface;
use App\VO\ClienteVO;

class ClienteService
{
    private PersistenceInterface $manager;

    public function __construct(PersistenceInterface $manager) {
        $this->manager = $manager;
    }

    public function createCadastro(ClienteBuildInterface $clienteBuild, ClienteVO $clienteVO)
    {
        $cliente = $clienteBuild
            ->setClienteVO($clienteVO)
            ->getCliente()
            ->build()
        ;

        $this->manager->persist($cliente);
        $this->manager->flush();
    }
}