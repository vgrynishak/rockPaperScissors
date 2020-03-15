<?php

namespace App\Strategy;

use App\Game\Elements\ElementInterface;

interface StrategyInterface
{
    /**
     * @return ElementInterface
     */
    public function doAlgorithm(): ElementInterface;
}
