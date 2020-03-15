<?php

namespace App\Component;

use Exception\InvalidModelIdException;
use Ramsey\Uuid\Uuid as UuidGenerator;

abstract class ModelId implements ModelIdInterface
{
    private $value;

    /**
     * ModelId constructor.
     * @param string $value
     *
     * @throws InvalidModelIdException
     */
    public function __construct(string $value)
    {
        if (!UuidGenerator::isValid($value)) {
            throw new InvalidModelIdException('Invalid ModelId given');
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
