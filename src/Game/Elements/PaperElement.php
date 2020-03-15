<?php

namespace App\Game\Elements;

class PaperElement implements ElementInterface
{
    public const PAPER = 'paper';
    /** @var  */
    private $value;

    /**
     * PaperElement constructor.
     */
    public function __construct()
    {
        $this->value = self::PAPER;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
