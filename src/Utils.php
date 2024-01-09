<?php

namespace BrainGames\Utils;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function isPrime(int $num): bool
{
    $multi = getSimpleMultipliers($num);
    return match (count($multi)) {
        2 => true,
        default => false,
    };
}

function getRandom(int $min, int $max): int
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

function getGCD(int $num1, int $num2): int
{
    $multi1 = getSimpleMultipliers($num1);
    $multi2 = getSimpleMultipliers($num2);
    $commonMultipliers = array_reduce($multi1, function ($acc, $num) use (&$multi1, &$multi2) {
        if (in_array($num, $multi2)) {
            $acc[] = $num;
            array_splice($multi1, array_search($num, $multi1), 1);
            array_splice($multi2, array_search($num, $multi2), 1);
        }
        return $acc;
    }, []);
    return array_reduce($commonMultipliers, fn($res, $num) => ($res * $num), 1);
}
