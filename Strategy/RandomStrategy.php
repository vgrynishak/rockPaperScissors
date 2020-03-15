<?php

namespace Strategy;

use Game\Elements\ElementInterface;
use Game\Elements\PaperElement;
use Game\Elements\RockElement;
use Game\Elements\ScissorsElement;

class RandomStrategy implements StrategyInterface
{
    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function doAlgorithm(): ElementInterface
    {
        $elements = [
            new PaperElement(),
            new RockElement(),
            new ScissorsElement()
        ];

        return $elements[random_int(0, 2)];
    }
}
