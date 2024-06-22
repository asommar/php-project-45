<?php

namespace Php\Project\Brain\Even;

use function cli\line;
use function cli\prompt;

function checkAnswer(int $number, string $answer): string
{
    if (
        ($answer === 'yes' && $number % 2 === 0)
        || ($answer === 'no' && $number % 2 === 1)
    ) {
        return $answer;
    } else {
        return $answer === 'no' ? 'yes' : 'no';
    }
}

function playBrainEven(): void
{
    $countLevels = 3;
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < $countLevels; $i++) {
        $number = rand();
        line("Question: %d", $number);
        $answer = prompt("Your answer: ");
        $correctAnswer = checkAnswer($number, $answer);
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
    line("Congratulations, %s", $userName);
}
