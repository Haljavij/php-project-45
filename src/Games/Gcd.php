<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_NUM = 1;
const MAX_NUM = 20;

function play(): void
{
    $result = [];
    for ($i = 1; $i <= ROUNDS; $i++) {
        $one = rand(MIN_NUM, MAX_NUM);
        $two = rand(MIN_NUM, MAX_NUM);
        $question = "{$one} {$two}";
        $correctAnswer = (string) gcd($one, $two);
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}

function gcd(int $num1, int $num2): int
{
    $rem = $num1 % $num2;

    while ($rem > 0) {
        $num1 = $num2;
        $num2 = $rem;
        $rem = $num1 % $num2;
    }
    return $num2;
}
