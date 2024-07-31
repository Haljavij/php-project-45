<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

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

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
