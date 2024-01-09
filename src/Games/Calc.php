<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\makeGame as makeGame;
use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\calc as calc;

function gameCalc()
{
    $makeQA = function () {
        $randNum1 = getRandom(1, 50);
        $randNum2 = getRandom(1, 50);
        $operands = ["+", "-", "*"];
        $randOperator = $operands[getRandom(0, count($operands) - 1)];
        $rightAnswer = calc($randNum1, $randNum2, $randOperator);
        return [
            "question" => "{$randNum1}{$randOperator}{$randNum2}",
            "answer" => $rightAnswer
        ];
    };

    makeGame(
        'What is the result of the expression?',
        $makeQA
    );
}
