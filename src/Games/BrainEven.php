<?php

namespace Php\Project\Games\Brain\Even;

use function PHP\Project\Engine\playGame;

use const PHP\Project\Engine\NUMBER_OF_LEVELS;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function getCorrectAnswer(int $number): string
{
    return ($number % 2) === 0 ? 'yes' : 'no';
}

function playBrainEven(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $question = rand();
        $questionsAndAnswers[] = [$question, getCorrectAnswer($question)];
    }

    playGame($questionsAndAnswers, RULES);
}
