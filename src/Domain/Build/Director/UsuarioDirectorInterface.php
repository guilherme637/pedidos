<?php

namespace App\Domain\Build\Director;

use App\Domain\Entity\Usuario;
use App\Domain\VO\UsuarioVO;

interface UsuarioDirectorInterface
{
    public function build(UsuarioVO $usuarioVO): Usuario;
}