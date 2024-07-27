<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function run(string $gameDescription, array $gameData)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, {$name}");
    line($gameDescription);

    $round = 0;

    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: {$question}");
        $answer = prompt('Your answer');

        if ($answer === $correctAnswer) {
            line('Correct!');
            $round += 1;
            if ($round === ROUNDS) {
                line("Congratulations, {$name}!");
            }
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
}
