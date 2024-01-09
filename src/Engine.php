<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\Hello as Hello;
use function cli\line as line;
use function cli\prompt as prompt;

const NEED_CNT_WIN_GAMES = 3;
const TEXT_GAME_WIN = "Congratulations";
const TEXT_GAME_FAIL = "Let's try again";

function makeListQuestions(callable $makeQA): array
{
    $arrQuestions = [];
    for ($i = 0; $i < NEED_CNT_WIN_GAMES; $i++) {
        $QA = $makeQA();
        $arrQuestions[] = [
            "question" => $QA['question'],
            "answer" => $QA['answer']
        ];
    }
    return $arrQuestions;
}

function makeGame(string $textGameRules, callable $makeQA): void
{
    $name = Hello();
    line($textGameRules);
    $cntRightAnswers = 0;

    $arrQuestions = makeListQuestions($makeQA);

    //Gaming loop
    $Game = function (int $ind) use ($arrQuestions): bool {
        $currentQuest = $arrQuestions[$ind];
        line('Question: ' . $currentQuest['question']);
        $userAnswer = prompt('Your answer');
        $rightAnswer = $currentQuest['answer'];
        if (
            $userAnswer == $rightAnswer
        ) {
            line('Correct!');
            return true;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            return false;
        }
    };

    for ($i = 0; $i < NEED_CNT_WIN_GAMES; $i++) {
        $resultGame = $Game($i);
        $cntRightAnswers = ($resultGame) ? $cntRightAnswers + 1 : $cntRightAnswers;
        if (!$resultGame) {
            break;
        }
    }

    if ($cntRightAnswers === NEED_CNT_WIN_GAMES) {
        line(TEXT_GAME_WIN . ", {$name}!");
    } else {
        line(TEXT_GAME_FAIL . ", {$name}!");
    }
}
