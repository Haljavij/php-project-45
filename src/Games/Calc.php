<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MIN_NUM = 1;
const MAX_NUM = 50;
const OPERATOR = ['+', '-', '*'];

function play(): void
{
    $result = [];
    for ($i = 1; $i <= ROUNDS; $i++) {
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
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}
