<?php

namespace App\Domain\Build\Usuario;

use App\Domain\Build\BuildInterface;
use App\VO\UsuarioVO;

interface UsuarioBuildInterface extends BuildInterface
{
    public function setUsuarioVO(UsuarioVO $usuarioVO): self;

    public function getUsuario(): self;

    public function addEndereco(): self;
}