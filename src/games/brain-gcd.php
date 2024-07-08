<?php

namespace Php\Project\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;

function playBrainGcd()
{
    $userName = greetUser();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $question = $number1 . ' ' . $number2;
        $correctAnswer = gmp_gcd($number1, $number2);
        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }
    line("Congratulations, %s", $userName);
}
