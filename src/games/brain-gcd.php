<?php

namespace Php\Project\Games\Brain\Gcd;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function getGCD(int $number1, int $number2): int
{
    if ($number1 < $number2) {
        $temp = $number2;
        $number2 = $number1;
        $number1 = $temp;
    }
    $modulo = $number1 % $number2;
    return $modulo === 0 ? $number2 : getGCD($number2, $modulo);
}

function playBrainGcd(): void
{
    $userName = greetUser();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $question = $number1 . ' ' . $number2;
        $correctAnswer = getGCD($number1, $number2);
        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }
    sayUserWon($userName);
}
