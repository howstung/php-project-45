<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function Welcome()
{
    line('Welcome to the Brain Games!');
}

function Hello(): string
{
    Welcome();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
