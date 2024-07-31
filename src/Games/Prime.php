<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

function play(): void
{
    $result = [];
    for ($i = 1; $i <= ROUNDS; $i++) {
        $question = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
