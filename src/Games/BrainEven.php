<?php

namespace Php\Project\Games\Brain\Even;

use function PHP\Project\Engine\playGame;

function getCorrectAnswer(int $number): string
{
    return ($number % 2) === 0 ? 'yes' : 'no';
}

function playBrainEven(): void
{
    $questionsAndAnswers = [];
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand();
        $questionsAndAnswers[] = [$question, getCorrectAnswer($question)];
    }

    playGame($questionsAndAnswers, $rules);
}
