<?php

namespace App\Service;

use App\Domain\Adapter\PersistenceInterface;
use App\Domain\Build\Usuario\UsuarioBuildInterface;
use App\VO\UsuarioVO;

class UsuarioService
{
    private PersistenceInterface $manager;

    public function __construct(PersistenceInterface $manager) {
        $this->manager = $manager;
    }

    public function createCadastro(UsuarioBuildInterface $usuarioBuild, UsuarioVO $usuarioVO)
    {
        $usuario = $usuarioBuild
            ->setUsuarioVO($usuarioVO)
            ->getUsuario()
            ->addEndereco()
            ->build()
        ;

        $this->manager->persist($usuario);
        $this->manager->flush();
    }
}