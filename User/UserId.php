<?php

namespace User;

use Component\ModelId;
use Exception\InvalidModelIdException;
use Exception\InvalidUserIdException;

class UserId extends ModelId
{
    /**
     * UserId constructor.
     * @param string $value
     * @throws InvalidUserIdException
     */
    public function __construct(string $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidModelIdException $exception) {
            throw new InvalidUserIdException('Invalid UserId given');
        }
    }
}
