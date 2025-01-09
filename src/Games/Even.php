<?php

namespace Php\Project\Game\Games\Even;

use function Php\Project\GameEngine\runGame;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function gameEven()
{
    $gameRules = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
    $minNumber = 1;
    $maxNumber = 100;
    $roundsCount = 3;
    $gameData = [];

    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = isEven($question) ? 'yes' : 'no';  
    
        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer];
    }
    return $result = [$gameRules, $gameData];
}
