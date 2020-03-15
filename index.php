<?php

require __DIR__ . '/vendor/autoload.php';

use App\User\User;
use App\User\UserId;
use App\Component\UUID\UUID;
use App\Strategy\AlwaysPaperStrategy;
use App\Strategy\RandomStrategy;
use App\Game\WinnerDefiner\WinnerDefiner;
use App\User\UserInterface;

try {
    $winnerDefiner = new WinnerDefiner();

    $userA = new User(
        new UserId((new UUID())->getValue()), 'A');

    $userB = new User(
        new UserId((new UUID())->getValue()), 'B');

    $strategyAlwaysPaper = new AlwaysPaperStrategy();
    $strategyRandom = new RandomStrategy();

    $userA->setStrategy($strategyAlwaysPaper);
    $userB->setStrategy($strategyRandom);

    $countWinA = 0;
    $countWinB = 0;
    $countWinDraw = 0;

    printf("%10s | %10s | %10s\n", $userA->getName(), $userB->getName(), 'Winner');
    for ($i = 0; $i < 100; $i++) {
        $userA->choiceElement();
        $userB->choiceElement();

        $winner = $winnerDefiner->getWinner($userA, $userB);
        printf("%10s | %10s | %10s\n",
            $userA->getElement()->getValue(),
            $userB->getElement()->getValue(),
            $winner instanceof UserInterface ? $winner->getName() : 'draw'
        );
        if (!$winner) {
            $countWinDraw++;
        } else {
            $winner === $userA ? $countWinA++ : $countWinB++;
        }
    }

    echo $userA->getName(). ' win: '.$countWinA."\n";
    echo $userB->getName(). ' win: '.$countWinB."\n";
    echo 'Draw:  '.$countWinDraw."\n";
} catch (Exception $exception) {
    echo $exception->getMessage().PHP_EOL;
    return false;
}
