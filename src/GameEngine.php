<?php

namespace Php\Project\GameEngine;

use function Cli\line;
use function Cli\prompt;

function runGame($gameRules, $gameData): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRules);

    foreach ($gameData as $round) {
        line('Question: %s', $round['question']);
        $answer = prompt('Your answer');

        if ($answer === $round['correctAnswer']) {
            line('Correct!');
        } else {
            line('%s is wrong answer ;(. Correct answer was %s.', $answer, $round['correctAnswer']);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
        line('Congratulations, %s', $name);
}
