<?php

namespace Php\Project\Games\Even;

use function Php\Project\GameEngine\runGame;
use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function gameEven()
{
    $gameRules = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = isEven($question) ? 'yes' : 'no';  
    
        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer];
    }
    return $result = [$gameRules, $gameData];
}
