<?php

namespace Php\Project\Games\Brain\Progression;

use function PHP\Project\Engine\playGame;

function getQuestionAndAnswer(): array
{
    $progression = [];
    $length = rand(PROGRESSION_MIN_LENGTH, PROGRESSION_MAX_LENGTH);
    $step = rand(1, PROGRESSION_MAX_DIFFERENCE);
    $startNumber = rand(0, PROGRESSION_FIRST_NUMBER);

    for ($i = 0, $currentNumber = $startNumber; $i < $length; $i++) {
        $progression[$i] = $currentNumber;
        $currentNumber += $step;
    }

    $positionOfHidden = rand(1, $length - 2);
    $hidden = $progression[$positionOfHidden];
    $progression[$positionOfHidden] = '..';

    $result = implode(' ', $progression);

    return [$result, $hidden];
}

function playBrainProgression(): void
{
    $rules = 'What number is missing in the progression?';
    $questionsAndAnswers = [];

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        $questionsAndAnswers[] = getQuestionAndAnswer();
    }

    playGame($questionsAndAnswers, $rules);
}
