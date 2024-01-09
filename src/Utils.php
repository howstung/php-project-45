<?php

namespace BrainGames\Utils;

function isEven($num): bool
{
    return $num % 2 === 0;
}

function getRandom($min, $max): int
{
    return rand($min, $max);
}

function calc(int $n1, int $n2, string $operand): ?int
{
    return match ($operand) {
        "+" => $n1 + $n2,
        "-" => $n1 - $n2,
        "*" => $n1 * $n2,
        default => null,
    };
}

function getSimpleMultipliers(int $num): array
{
    $multi = [];
    $numCopy = $num;
    for ($i = 1; $i <= $numCopy; $i++) {
        if ($numCopy % $i === 0) {
            $multi[] = $i;
            $numCopy = $numCopy / $i;
            $i = 1;
        }
    }
    return $multi;
}

function getGCD($num1, $num2): int
{
    $multi1 = getSimpleMultipliers($num1);
    $multi2 = getSimpleMultipliers($num2);
    $commonMultipliers = array_intersect($multi1, $multi2);
    return array_reduce($commonMultipliers, fn($res, $num) => ($res * $num), 1);
}
