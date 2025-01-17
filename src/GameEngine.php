<?php

namespace Php\Project\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function runGameEngine(string $gameRules, array $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("%s\n", $gameRules);

    foreach ($gameData as $round) {
        line('Question: %s', $round['question']);
        $answer = prompt('Your answer');

        if ($answer == $round['correctAnswer']) {
            line('Correct!');
            continue;
        }
        line('%s is wrong answer ;(. Correct answer was %s.', $answer, $round['correctAnswer']);
        line('Let\'s try again, %s!', $name);
        return;
    }
        line('Congratulations, %s!', $name);
}
