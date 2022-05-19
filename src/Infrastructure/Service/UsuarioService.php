<?php

namespace App\Infrastructure\Service;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\VO\UsuarioVO;
use App\Infrastructure\Build\Director\UsuarioDirector;

class UsuarioService
{
    private PersistenceInterface $manager;

    public function __construct(PersistenceInterface $manager) {
        $this->manager = $manager;
    }

    public function create(UsuarioVO $usuarioVO)
    {
        $usuarioDirector = new UsuarioDirector();
        $usuario = $usuarioDirector->build($usuarioVO);

        $this->manager->persist($usuario);
        $this->manager->flush();
    }
}