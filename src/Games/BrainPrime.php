<?php

namespace Php\Project\Games\Brain\Prime;

use function PHP\Project\Engine\playGame;
use const PHP\Project\Engine\MAX_RAND_NUMBER;
use const PHP\Project\Engine\NUMBER_OF_LEVELS;

const RULES = 'Find the greatest common divisor of given numbers.';

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
    $questionsAndAnswers = [];

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand(2, MAX_RAND_NUMBER);
        $correctAnswer = getCorrectAnswer(isPrime($question));

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    playGame($questionsAndAnswers, RULES);
}
