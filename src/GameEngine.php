<?php

namespace Php\Project\GameEngine;

use function Cli\line;
use function Cli\prompt;

function runGame($gameRules, $question, $correctAnswer)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRules);

    $roundsCount = 3;

    for ($i = 0; $i < $roundsCount; $i++) {

        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer === $correctAnswer) {
            line('Correct!');
            
        } else {
            line('%s is wrong answer ;(. Correct answer was %s.', $answer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }
    }
        line('Congratulations, %s', $name);
}