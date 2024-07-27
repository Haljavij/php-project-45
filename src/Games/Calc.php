<?php

namespace BrainGames\Games\Calc;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MIN_NUM = 1;
const MAX_NUM = 50;
const OPERATOR = ['+', '-', '*'];

function play(): void
{
    $result = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $a = rand(MIN_NUM, MAX_NUM);
        $b = rand(MIN_NUM, MAX_NUM);
        $operationId = array_rand(OPERATOR);
        $operation = OPERATOR[$operationId];
        $question = "{$a} {$operation} {$b}";
        $correctAnswer = (string) calc($a, $b, $operation);
        $result[] = [$question, $correctAnswer];
    }

    run(GAME_DESCRIPTION, $result);
}

function calc(int $num1, int $num2, string $operator): int
{
    if ($operator === '+') {
        return $num1 + $num2;
    } elseif ($operator === '-') {
        return $num1 - $num2;
    } else {
        return $num1 * $num2;
    }
}
