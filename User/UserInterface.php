<?php

namespace User;

use Game\Elements\ElementInterface;
use Strategy\StrategyInterface;

interface UserInterface
{
    /**
     * @return UserId|null
     */
    public function getId(): ? UserId;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param StrategyInterface|null $strategy
     */
    public function setStrategy(?StrategyInterface $strategy): void;

    /**
     * @return StrategyInterface|null
     */
    public function getStrategy(): ?StrategyInterface;

    /**
     * @return ElementInterface
     */
    public function getElement(): ?ElementInterface;


    /**
     * @return void
     */
    public function choiceElement(): void;

}
