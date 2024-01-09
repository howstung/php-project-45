<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\Hello as Hello;
use function cli\line as line;
use function cli\prompt as prompt;

const NEED_CNT_WIN_GAMES = 3;

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

function Game(int $ind, array $arrQuestions): callable
{
    return function () use ($ind, $arrQuestions): bool {
        $currentQuest = $arrQuestions[$ind];
        line('Question: %s', $currentQuest['question']);
        $userAnswer = prompt('Your answer');
        $rightAnswer = $currentQuest['answer'];
        if (
            $userAnswer == $rightAnswer
        ) {
            line('Correct!');
            return true;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $rightAnswer);
            return false;
        }
    };
}

function makeGame(string $textGameRules, callable $makeQA): void
{
    $name = Hello();
    line($textGameRules);
    $cntRightAnswers = 0;
    $arrQuestions = makeListQuestions($makeQA);

    //Gaming loops
    for ($i = 0; $i < NEED_CNT_WIN_GAMES; $i++) {
        $resultGame = Game($i, $arrQuestions)();
        $cntRightAnswers = ($resultGame) ? $cntRightAnswers + 1 : $cntRightAnswers;
        if (!$resultGame) {
            line("Let's try again, %s!", $name);
            break;
        } elseif ($cntRightAnswers === NEED_CNT_WIN_GAMES) {
            line("Congratulations, %s!", $name);
        }
    }
}
