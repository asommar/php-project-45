<?php

// "исполняемый файл" -> "игра" -> "движок".
namespace PHP\Project\Engine;
use function cli\line;
use function cli\prompt;

function greetUser(): string
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    return $userName;
}
