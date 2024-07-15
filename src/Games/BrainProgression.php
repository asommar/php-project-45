<?php

namespace Php\Project\Games\Brain\Progression;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\playLevel;
use function PHP\Project\Engine\sayUserWon;

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
    $userName = greetUser();

    line('What number is missing in the progression?');

    for ($i = 0; $i < NUMBER_OF_LEVELS; $i++) {
        [$question, $correctAnswer] = getQuestionAndAnswer();

        if (!playLevel($question, $correctAnswer, $userName)) {
            return;
        }
    }

    sayUserWon($userName);
}
