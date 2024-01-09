<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\makeGame as makeGame;
use const BrainGames\Engine\NEED_CNT_WIN_GAMES;

use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\calc as calc;


function gameCalc()
{
    $arrQuestions = [];
    for ($i = 0; $i < NEED_CNT_WIN_GAMES; $i++) {
        $randNum1 = getRandom(1, 50);
        $randNum2 = getRandom(1, 50);
        $operands = ["+", "-", "*"];
        $randOperator = $operands[getRandom(0, count($operands) - 1)];
        $rightAnswer = calc($randNum1, $randNum2, $randOperator);
        $arrQuestions[] = [
            "question" => "{$randNum1}{$randOperator}{$randNum2}",
            "answer" => $rightAnswer
        ];
    }

    makeGame(
        'What is the result of the expression?',
        $arrQuestions
    );
}
