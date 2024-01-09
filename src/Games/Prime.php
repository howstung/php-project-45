<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\makeGame as makeGame;
use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\isPrime as isPrime;

function gamePrime(): void
{
    $makeQA = function () {
        $randNum = getRandom(1, 100);
        $rightAnswer = isPrime($randNum) ? 'yes' : 'no';
        return [
            'question' => $randNum,
            'answer' => $rightAnswer,
        ];
    };

    makeGame(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        $makeQA
    );
}
