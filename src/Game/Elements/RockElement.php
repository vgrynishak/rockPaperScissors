<?php

namespace App\Game\Elements;

class RockElement implements ElementInterface
{
    public const ROCK = 'rock';

    /** @var string */
    private $value;

    /**
     * RockElement constructor.
     */
    public function __construct()
    {
        $this->value = self::ROCK;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
