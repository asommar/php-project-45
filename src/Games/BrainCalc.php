<?php

namespace Php\Project\Games\Brain\Calc;

use function PHP\Project\Engine\playGame;
use const PHP\Project\Engine\MAX_RAND_NUMBER;
use const PHP\Project\Engine\NUMBER_OF_LEVELS;

const RULES = 'What is the result of the expression?';

function getRandomOperator(): string
{
    $operators = ['+', '-', '*'];

    return $operators[array_rand($operators, 1)];
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
            throw new \Exception("Invalid operator '{$operation}'.");
    }
}

function playBrainCalc(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $number1 = rand(1, MAX_RAND_NUMBER);
        $number2 = rand(1, MAX_RAND_NUMBER);
        $operator = getRandomOperator();

        $question = "{$number1} {$operator} {$number2}";
        $correctAnswer = (string)calculate($number1, $operator, $number2);

        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    playGame($questionsAndAnswers, RULES);
}
