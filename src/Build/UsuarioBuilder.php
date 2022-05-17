<?php

namespace App\Build;

use App\Domain\Build\Usuario\UsuarioBuildInterface;
use App\Domain\Entity\Endereco;
use App\Domain\Entity\Usuario;
use App\VO\UsuarioVO;

class UsuarioBuilder implements UsuarioBuildInterface
{
    private Usuario $usuario;
    private UsuarioVO $usuarioVO;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function setUsuarioVO(UsuarioVO $usuarioVO): self
    {
        $this->usuarioVO = $usuarioVO;

        return $this;
    }

    public function getUsuario(): self
    {
        $this->usuario
            ->setEmail($this->usuarioVO->getEmail())
            ->setNome($this->usuarioVO->getNome())
            ->setTelefone($this->usuarioVO->getTelefone())
            ->setPassword($this->usuarioVO->getPassword())
            ->setRole($this->usuarioVO->getRole())
            ->setIsAtivo(true)
        ;

        return $this;
    }

    public function addEndereco(): self
    {
        $enderenco = new Endereco();
        $enderecoVO = $this->usuarioVO->getEndereco();

        $enderenco
            ->setUsuario($this->usuario)
            ->setRua($enderecoVO->getRua())
            ->setNumero($enderecoVO->getNumero())
            ->setCep($enderecoVO->getCep())
        ;

        $this->usuario->setEndereco($enderenco);

        return $this;
    }
    
    public function build(): Usuario
    {
        return $this->usuario;
    }
}