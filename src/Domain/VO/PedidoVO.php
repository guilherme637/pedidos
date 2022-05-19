<?php

namespace App\Domain\VO;

use Doctrine\Common\Collections\ArrayCollection;

class PedidoVO
{
    public function __construct(
        private ?int $id,
        private int $usuario,
        private \DateTime $dataCriacao,
        private string $statusPedido,
        private ArrayCollection $produtos
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): int
    {
        return $this->usuario;
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