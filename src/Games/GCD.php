<?php

namespace Php\Project\Games\Gcd;

use function Php\Project\GameEngine\runGameEngine;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function runGameGcd(): void
{
    $gameRules = "Find the greatest common divisor of given numbers.";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);

        $question = "{$firstNumber} {$secondNumber}";
        $correctAnswer = gcd($firstNumber, $secondNumber);

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }

    runGameEngine($gameRules, $gameData);
}

function gcd(int $a, int $b): int
{
    return ($a % $b) !== 0 ? gcd($b, $a % $b) : $b;
}

