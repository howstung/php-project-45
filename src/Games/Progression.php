<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\makeGame as makeGame;
use function BrainGames\Utils\getRandom as getRandom;

function gameArithmProgress(): void
{
    $makeQA = function () {
        $minElementsNotHidden = 5;
        $lenProgr = getRandom($minElementsNotHidden + 1, 10);
        $stepProgr = getRandom(1, 12);
        $firstItemProgr = getRandom(1, 50);
        $posHideElement = getRandom(0, $lenProgr - 1);
        $hiddenElementMarker = "..";
        $arrayProgr = [];
        $hideItem = null;
        for ($i = 0; $i < $lenProgr; $i++) {
            if ($i !== $posHideElement) {
                $arrayProgr[] = $firstItemProgr + $stepProgr * $i;
            } else {
                $arrayProgr[] = $hiddenElementMarker;
                $hideItem = $firstItemProgr + $stepProgr * $i;
            }
        }
        $strProgr = implode(" ", $arrayProgr);
        return [
            'question' => $strProgr,
            'answer' => $hideItem,
        ];
    };

    makeGame('What number is missing in the progression?', $makeQA);
}
