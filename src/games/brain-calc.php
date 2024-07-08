<?php

// "исполняемый файл" -> "ИГРА" -> "движок".
//Если программу (модуль, библиотеку) рассматривать как чёрный ящик,
// то API — это набор «ручек», которые доступны пользователю данного ящика
// и которые он может вертеть и переключать.
//«Модуль должен отвечать за одного и только за одного актора.»
//«программные сущности … должны быть открыты для расширения, но закрыты для модификации».
//много интерфейсов, специально предназначенных для клиентов, лучше, чем один интерфейс общего назначения
//«Зависимость на Абстракциях. Нет зависимости на что-то конкретное»
namespace Php\Project\Games\Brain\Calc;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function getRandomOperator(): string
{
    $operators = ['+', '-', '*'];
    return $operators[rand()&2];
}

function doMath($a, $operation, $b): ?int
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
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $operator = getRandomOperator();
        $question = "{$number1} {$operator} {$number2}";
        $correctAnswer = doMath($number1, $operator, $number2);
        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }
    sayUserWon($userName);
}
