<?php

namespace PHP\Project\Engine;

use function cli\line;
use function cli\prompt;

//Number of levels is the in every game
const NUMBER_OF_LEVELS = 3;

//Maximum random number in math games
const MAX_RAND_NUMBER = 50;

function playLevel(string $question, string $correctAnswer, string $userName): bool
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

function playGame(array $questionsAndAnswers, string $rulesOfGame): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line($rulesOfGame);

    foreach ($questionsAndAnswers as [$question, $correctAnswer]) {
        if (!playLevel((string)$question, (string)$correctAnswer, $userName)) {
            return;
        }
    }

    line("Congratulations, %s!", $userName);
}
