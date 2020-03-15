<?php

namespace Strategy;

use Game\Elements\ElementInterface;

interface StrategyInterface
{
    /**
     * @return ElementInterface
     */
    public function doAlgorithm(): ElementInterface;
}
