<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\makeGame as makeGame;
use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\getGCD as getGCD;

function gameGCD()
{
    $makeQA = function () {
        $randNum1 = getRandom(1, 100);
        $randNum2 = getRandom(1, 100);
        $GCD = getGCD($randNum1, $randNum2);
        $rightAnswer = $GCD;
        return [
            'question' => "{$randNum1} {$randNum2}",
            'answer' => $rightAnswer,
        ];
    };

    makeGame(
        'Find the greatest common divisor of given numbers.',
        $makeQA
    );
}
