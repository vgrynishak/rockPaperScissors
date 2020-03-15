<?php

namespace App\Game\Elements;

class ScissorsElement implements ElementInterface
{
    public const SCISSORS = 'scissors';

    /** @var string */
    private $value;

    /**
     * ScissorsElement constructor.
     */
    public function __construct()
    {
        $this->value = self::SCISSORS;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
