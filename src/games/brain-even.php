<?php

namespace Php\Project\Games\Brain\Even;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function getCorrectAnswer(int $number): string
{
    return ($number % 2) === 0 ? 'yes' : 'no';
}

function playBrainEven(): void
{
    $userName = greetUser();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand();
        $correctAnswer = getCorrectAnswer($question);

        if (!playLevel((string)$question, $correctAnswer, $userName)) {
            return;
        }
    }

    sayUserWon($userName);
}
