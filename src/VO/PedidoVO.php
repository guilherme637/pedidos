<?php

namespace App\VO;

use Doctrine\Common\Collections\ArrayCollection;

class PedidoVO
{
    public function __construct(
        private ?int $id,
        private ClienteVO $cliente,
        private \DateTime $dataCriacao,
        private string $statusPedido,
        private ArrayCollection $produtos
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ClienteVO
    {
        return $this->cliente;
    }

    public function getDataCriacao(): \DateTime
    {
        return $this->dataCriacao;
    }

    public function getStatusPedido(): string
    {
        return $this->statusPedido;
    }

    public function getProdutos(): ArrayCollection
    {
        return $this->produtos;
    }
}