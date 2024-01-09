<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\makeGame as makeGame;
use const BrainGames\Engine\NEED_CNT_WIN_GAMES as NEED_CNT_WIN_GAMES;

use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\isEven as isEven;


function gameEven()
{
    $arrQuestions = [];
    for ($i = 0; $i < NEED_CNT_WIN_GAMES; $i++) {
        $randNum = getRandom(1, 100);
        $rightAnswer = isEven($randNum) ? 'yes' : 'no';
        $arrQuestions[] = [
            "question" => $randNum,
            "answer" => $rightAnswer
        ];
    }

    makeGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        $arrQuestions
    );
}
