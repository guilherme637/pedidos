<?php

namespace App\Adapter;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializerInterface;

class Serializer implements \App\Domain\Adapter\SerializerInterface
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function deserialize(
        string $data,
        string $type,
        string $format,
        ?DeserializationContext $context = null
    ): object {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    public function serialize(array|object $data, string $type): string
    {
        return $this->serializer->serialize($data, $type);
    }
}