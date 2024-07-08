<?php

namespace Php\Project\Games\Brain\Prime;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function getCorrectAnswer(int $number): string
{
    return $number === 2 ? 'yes' : 'no';
}

function playBrainPrime(): void
{
    $userName = greetUser();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand(2, 101);
        $correctAnswer = getCorrectAnswer(gmp_prob_prime($question));
        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }
    sayUserWon($userName);
}
