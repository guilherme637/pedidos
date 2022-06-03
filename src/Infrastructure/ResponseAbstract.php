<?php

namespace App\Infrastructure;

use App\Domain\Adapter\SerializerInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait ResponseTrait
{
    private SerializerInterface $serializer;

    #[Required]
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }
}