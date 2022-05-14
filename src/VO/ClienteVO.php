<?php

namespace App\VO;


class ClienteVO
{
    public function __construct(
        private ?int $id,
        private string $nome,
        private string $email,
        private string $telefone,
        private ?EnderecoVO $endereco,
        private ?PedidoVO $pedido
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getEndereco(): EnderecoVO
    {
        return $this->endereco;
    }

    public function getPedido(): PedidoVO
    {
        return $this->pedido;
    }
}