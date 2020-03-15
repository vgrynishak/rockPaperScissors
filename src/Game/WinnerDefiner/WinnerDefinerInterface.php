<?php

namespace App\Game\WinnerDefiner;

use App\User\UserInterface;

interface WinnerDefinerInterface
{
    /**
     * @param UserInterface $firstUser
     * @param UserInterface $secondUser
     * @return UserInterface|null Returns winner UserInterface or null if no winner
     */
    public function getWinner(UserInterface $firstUser, UserInterface $secondUser): ?UserInterface;
}
