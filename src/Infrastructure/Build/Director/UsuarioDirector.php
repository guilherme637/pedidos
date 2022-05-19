<?php

namespace App\Infrastructure\Build\Director;

use App\Domain\Build\Director\UsuarioDirectorInterface;
use App\Domain\Entity\Endereco;
use App\Domain\Entity\Usuario;
use App\Domain\VO\UsuarioVO;
use App\Infrastructure\Build\Usuario\UsuarioBuilder;

class UsuarioDirector implements UsuarioDirectorInterface
{
    public function build(UsuarioVO $usuarioVO): Usuario
    {
        $usuarioBuilder = new UsuarioBuilder();
        $usuarioBuilder->setNome($usuarioVO->getNome());
        $usuarioBuilder->setEmail($usuarioVO->getEmail());
        $usuarioBuilder->setPassword($usuarioVO->getPassword());
        $usuarioBuilder->setTelefone($usuarioVO->getTelefone());
        $usuarioBuilder->setRole($usuarioVO->getRole());
        $usuarioBuilder->setEndereco($this->getEndereco($usuarioVO, $usuarioBuilder->build()));
        $usuarioBuilder->setIsAtivo(true);

        return $usuarioBuilder->build();
    }

    private function getEndereco(UsuarioVO $usuarioVO, Usuario $usuario): Endereco
    {
        $enderecoVO = $usuarioVO->getEndereco();
        $endereco = new Endereco();
        $endereco->setRua($enderecoVO->getRua());
        $endereco->setNumero($enderecoVO->getNumero());
        $endereco->setCep($enderecoVO->getCep());
        $endereco->setUsuario($usuario);

        return $endereco;
    }
}