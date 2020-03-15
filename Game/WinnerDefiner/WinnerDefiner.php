<?php

namespace Game\WinnerDefiner;

use Exception\StrategyNotSelected;
use Game\Elements\PaperElement;
use Game\Elements\RockElement;
use Game\Elements\ScissorsElement;
use User\UserInterface;

class WinnerDefiner implements WinnerDefinerInterface
{
    public const WIN = 'win';
    public const LOSE = 'lose';
    public const DRAW = 'draw';

    /**
     * @inheritDoc
     * @throws StrategyNotSelected
     */
    public function getWinner(UserInterface $firstUser, UserInterface $secondUser): ?UserInterface
    {
        if (!$firstUser->getElement() || !$secondUser->getElement()) {
            throw new StrategyNotSelected('all user must have element');
        }

        $resultGame = $this->winnerDefiner()[$firstUser->getElement()->getValue()][$secondUser->getElement()->getValue()];

        if ($resultGame === self::DRAW) {
            return null;
        }

        return $resultGame === self::WIN ? $firstUser : $secondUser;
    }

    /**
     * @return array
     */
    private function winnerDefiner(): array
    {
        return [
            ScissorsElement::SCISSORS => [
                PaperElement::PAPER => self::WIN,
                RockElement::ROCK => self::LOSE,
                ScissorsElement::SCISSORS => self::DRAW
            ],
            PaperElement::PAPER => [
                PaperElement::PAPER => self::DRAW,
                RockElement::ROCK => self::WIN,
                ScissorsElement::SCISSORS => self::LOSE
            ],
            RockElement::ROCK => [
                PaperElement::PAPER => self::LOSE,
                RockElement::ROCK => self::DRAW,
                ScissorsElement::SCISSORS => self::WIN
            ]
        ];
    }
}
