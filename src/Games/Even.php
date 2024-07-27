<?php

namespace BrainGames\Games\Even;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
function play()
{
    $result = [];

    for ($i = 0; $i < ROUNDS; $i++) {
        $question = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}
