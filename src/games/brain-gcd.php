<?php

namespace Php\Project\Games\Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function PHP\Project\Engine\greetUser;

function playBrainGcd()
{
    $userName = greetUser();
    line('What is the result of the expression?');
    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        line("Question: %d %d", $number1, $number2);
        $answer = prompt("Your answer");
        $correctAnswer = gmp_gcd($number1, $number2);
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s", $userName);
}
