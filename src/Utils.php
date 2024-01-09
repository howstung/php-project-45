<?php

namespace BrainGames\Utils;

use function BrainGames\Cli\Hello as Hello;
use function cli\line as line;

function isEven($num): bool
{
    return $num % 2 === 0;
}

function getCorrectAnswer($num)
{
    return (isEven($num)) ? 'yes' : 'no';
}

function getRandom($min, $max)
{
    return rand($min, $max);
}

function makeGame($textRules, $needCntWinGames, callable $Game, $textGameFail, $textGameWin)
{
    $name = Hello();
    line($textRules);
    $cntRightAnswers = 0;

    do {
        $resGame = $Game();
        $cntRightAnswers = ($resGame) ? $cntRightAnswers + 1 : $cntRightAnswers;
    } while ($resGame && $cntRightAnswers < $needCntWinGames);

    if ($cntRightAnswers === $needCntWinGames) {
        line("{$textGameWin}, {$name}!");
    } else {
        line("{$textGameFail}, {$name}!");
    }
}
