<?php

namespace Php\Project\Games\Brain\Progression;

use function cli\line;
use function PHP\Project\Engine\greetUser;
use function PHP\Project\Engine\PlayLevel;
use function PHP\Project\Engine\sayUserWon;

function getQuestionAndAnswer(): array
{
    $length = rand(5, 10);
    $step = rand (1, 10);
    $positionOfHidden = rand (1, $length - 2);
    $startNumber = rand(0, 50);
    $result = '';
    $hidden = 0;

    for ($i = 0, $currentNumber = $startNumber; $i < $length; $i++) {
        if ($i === $positionOfHidden) {
            $hidden = $currentNumber;
            $result .= ' ..';
        } else {
            $result .= ' ' . $currentNumber;
        }
        $currentNumber += $step;
    }

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
