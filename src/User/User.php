<?php

namespace App\User;

use App\Game\Elements\ElementInterface;
use App\Strategy\StrategyInterface;

class User implements UserInterface
{
    /** @var UserId */
    private $id;
    /** @var string */
    private $name;
    /** @var StrategyInterface */
    private $strategy;
    /** @var ElementInterface */
    private $element;
    /**
     * User constructor.
     * @param UserId $id
     * @param string $name
     */
    public function __construct(UserId $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return UserId|null
     */
    public function getId(): ?UserId
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param StrategyInterface|null $strategy
     */
    public function setStrategy(?StrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @return void
     */
    public function choiceElement(): void
    {
        $this->element = $this->strategy->doAlgorithm();
    }

    public function getElement(): ?ElementInterface
    {
        return $this->element;
    }

    /**
     * @inheritDoc
     */
    public function getStrategy(): ?StrategyInterface
    {
        return $this->strategy;
    }
}
