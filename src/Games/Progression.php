<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MIN_STEP_RANGE = 2;
const MAX_STEP_RANGE = 5;
const MIN_START_RANGE = -10;
const MAX_START_RANGE = 10;
const MIN_END_RANGE = 30;
const MAX_END_RANGE = 40;


function play(): void
{
    $result = [];
    for ($i = 1; $i <= ROUNDS; $i++) {
        $step = rand(MIN_STEP_RANGE, MAX_STEP_RANGE);
        $start = rand(MIN_START_RANGE, MAX_START_RANGE);
        $end = rand(MIN_END_RANGE, MAX_END_RANGE);
        $progression = makeProgression($step, $start, $end);

        $itemId = rand(0, count($progression) - 1);
        $correctAnswer = (string) $progression[$itemId];
        $progression[$itemId] = '..';
        $question = implode(' ', $progression);
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}

function makeProgression(int $step, int $start, int $end): array
{

    return range($start, $end, $step);
}
