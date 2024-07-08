<?php
// "исполняемый файл" -> "ИГРА" -> "движок".

namespace Php\Project\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function PHP\Project\Engine\sayUserWon;

function getCorrectAnswer(int $number, string $answer): string
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
    $countLevels = NUMBER_OF_LEVELS;
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < $countLevels; $i++) {
        $number = rand();
        line("Question: %d", $number);
        $answer = prompt("Your answer: ");
        $correctAnswer = getCorrectAnswer($number, $answer);
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    sayUserWon($userName);
}
