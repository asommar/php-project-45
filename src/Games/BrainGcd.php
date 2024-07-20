<?php

namespace Php\Project\Games\Brain\Gcd;

use function PHP\Project\Engine\playGame;
use const PHP\Project\Engine\MAX_RAND_NUMBER;
use const PHP\Project\Engine\NUMBER_OF_LEVELS;

const RULES = 'Find the greatest common divisor of given numbers.';

function getGCD(int $number1, int $number2): int
{
    if ($number1 < $number2) {
        $temp = $number2;
        $number2 = $number1;
        $number1 = $temp;
    }

    $modulo = $number1 % $number2;

    return ($modulo === 0) ? $number2 : getGCD($number2, $modulo);
}

function playBrainGcd(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, MAX_RAND_NUMBER);
        $number2 = rand(1, MAX_RAND_NUMBER);

        $question = "{$number1} {$number2}";

        $correctAnswer = getGCD($number1, $number2);

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    playGame($questionsAndAnswers, RULES);
}
