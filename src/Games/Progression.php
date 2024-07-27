<?php

namespace BrainGames\Games\Progression;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MIN_STEP_RANGE = 2;
const MAX_STEP_RANGE = 5;
const MIN_START_RANGE = -10;
const MAX_START_RANGE = 10;

function makeProgression(int $step, int $start = 0): array
{
    return range($start, 30, $step);
}

function play(): void
{
    $result = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $step = rand(MIN_STEP_RANGE, MAX_STEP_RANGE);
        $start = rand(MIN_START_RANGE, MAX_START_RANGE);
        $progression = makeProgression($step, $start);

        $itemId = rand(0, count($progression) - 1);
        $correctAnswer = (string) $progression[$itemId];
        $progression[$itemId] = '..';
        $question = implode(' ', $progression);
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}
