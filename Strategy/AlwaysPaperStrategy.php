<?php

namespace Strategy;

use Game\Elements\ElementInterface;
use Game\Elements\PaperElement;

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
