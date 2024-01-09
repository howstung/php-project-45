<?php

namespace BrainGames\Utils;

function isEven($num): bool
{
    return $num % 2 === 0;
}

function getRandom($min, $max)
{
    return rand($min, $max);
}

function calc(int $n1, int $n2, string $operand)
{
    return match ($operand) {
        "+" => $n1 + $n2,
        "-" => $n1 - $n2,
        "*" => $n1 * $n2,
        default => null,
    };
}
