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

function PlayLevel(string $question, string $correctAnswer, string $userName): bool
{
    line("Question: %s", $question);
    $answer = prompt("Your answer");
    if ($answer != $correctAnswer) {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s!", $userName);
        return false;
    }
    line("Correct!");
    return true;
}

function sayUserWon($userName): void
{
    line("Congratulations, %s", $userName);
}
