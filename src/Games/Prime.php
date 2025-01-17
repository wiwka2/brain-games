<?php

namespace Php\Project\Games\Prime;

use function Php\Project\GameEngine\runGameEngine;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function runGamePrime(): void
{
    $gameRules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "{$number}";
        $correctAnswer = isPrime($number) ? "yes" : "no";

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }

    runGameEngine($gameRules, $gameData);
}

function isPrime(int $number): bool
{
    if ($number % 2 == 0 || $number < 2) {
        return false;
    }
    if ($number == 2) {
        return true;
    }
    $i = 3;
    $max_factor = (int)sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}
