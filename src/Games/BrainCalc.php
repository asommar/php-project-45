<?php

namespace Php\Project\Games\Brain\Calc;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\playLevel;
use function PHP\Project\Engine\sayUserWon;

function getRandomOperator(): string
{
    $operators = ['+', '-', '*'];

    return $operators[rand() & 2];
}

function calculate(int $a, string $operation, int $b): ?int
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            return null;
    }
}

function playBrainCalc(): void
{
    $userName = greetUser();

    line('What is the result of the expression?');

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, MAX_RAND_NUMBER);
        $number2 = rand(1, MAX_RAND_NUMBER);
        $operator = getRandomOperator();

        $question = "{$number1} {$operator} {$number2}";
        $correctAnswer = (string)calculate($number1, $operator, $number2);

        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }

    sayUserWon($userName);
}
