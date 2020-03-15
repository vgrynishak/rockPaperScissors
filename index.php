<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__.'/User/UserInterface.php';
require __DIR__.'/Component/UUID/UUID.php';
require __DIR__. '/User/User.php';
require __DIR__. '/Component/ModelIdInterface.php';
require __DIR__. '/Component/ModelId.php';
require __DIR__. '/User/UserId.php';
require __DIR__.'/Game/WinnerDefiner/WinnerDefinerInterface.php';
require __DIR__.'/Game/WinnerDefiner/WinnerDefiner.php';
require __DIR__.'/Strategy/StrategyInterface.php';
require __DIR__.'/Strategy/AlwaysPaperStrategy.php';
require __DIR__.'/Strategy/RandomStrategy.php';
require __DIR__.'/Game/Elements/ElementInterface.php';
require __DIR__.'/Game/Elements/PaperElement.php';
require __DIR__.'/Game/Elements/RockElement.php';
require __DIR__.'/Game/Elements/ScissorsElement.php';
require __DIR__.'/Exception/StrategyNotSelected.php';
require __DIR__.'/Exception/InvalidModelIdException.php';
require __DIR__.'/Exception/InvalidUserIdException.php';

//spl_autoload_register(function ($class_name) {
//    include $class_name . '.php';
//});

use User\User;
use User\UserId;
use Component\UUID\UUID;
use Strategy\AlwaysPaperStrategy;
use Strategy\RandomStrategy;
use Game\WinnerDefiner\WinnerDefiner;
use User\UserInterface;

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
