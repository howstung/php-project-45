<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\makeGame as makeGame;
use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\isEven as isEven;

function gameEven()
{
    $makeQA = function () {
        $randNum = getRandom(1, 100);
        $rightAnswer = isEven($randNum) ? 'yes' : 'no';
        return [
            'question' => $randNum,
            'answer' => $rightAnswer,
        ];
    };

    makeGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        $makeQA
    );
}
