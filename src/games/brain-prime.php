<?php

namespace Php\Project\Games\Brain\Prime;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    } elseif ($num === 2) {
        return true;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getCorrectAnswer(bool $data): string
{
    return $data ? 'yes' : 'no';
}

function playBrainPrime(): void
{
    $userName = greetUser();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand(2, 101);
        $correctAnswer = getCorrectAnswer(isPrime($question));
        if (!playLevel((string)$question, $correctAnswer, $userName)) {
            return;
        }
    }
    sayUserWon($userName);
}
