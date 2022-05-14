<?php

namespace App\Domain\Adapter;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;

interface SerializerInterface
{
    /** @throws RuntimeException */
    public function deserialize(
        string $data,
        string $type,
        string $format,
        ?DeserializationContext $context = null
    ): object;

    /** @throws RuntimeException */
    public function serialize(array|object $data, string $type): string;
}