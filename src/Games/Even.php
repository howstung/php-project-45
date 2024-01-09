<?php

namespace BrainGames\Games\Even;

use function cli\line as line;
use function cli\prompt as prompt;
use function BrainGames\Utils\makeGame;
use function BrainGames\Utils\getRandom as getRandom;
use function BrainGames\Utils\getCorrectAnswer as getCorrectAnswer;

function gameEven()
{
    $engineEven = function (): bool {
        $randNum = getRandom(1, 1000);

        line('Question: ' . $randNum);
        $userResponse = prompt('Your answer');
        $rightAnswer = getCorrectAnswer($randNum);
        if (
            $userResponse === $rightAnswer
        ) {
            line('Correct!');
            return true;
        } else {
            line("'{$userResponse}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            return false;
        }
    };
    makeGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        3,
        $engineEven,
        "Let's try again",
        "Congratulations"
    );
}
