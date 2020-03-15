<?php

namespace App\Strategy;

use App\Game\Elements\ElementInterface;
use App\Game\Elements\PaperElement;
use App\Game\Elements\RockElement;
use App\Game\Elements\ScissorsElement;

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
