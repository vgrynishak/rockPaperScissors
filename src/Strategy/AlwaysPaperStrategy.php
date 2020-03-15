<?php

namespace App\Strategy;

use App\Game\Elements\ElementInterface;
use App\Game\Elements\PaperElement;

class AlwaysPaperStrategy implements StrategyInterface
{
    /**
     * @return ElementInterface
     */
    public function doAlgorithm(): ElementInterface
    {
        return new PaperElement();
    }
}
