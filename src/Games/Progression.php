<?php

namespace Php\Project\Games\Progression;

use function Php\Project\GameEngine\runGameEngine;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function runGameProgression(): void
{
    $gameRules = "What number is missing in the progression?";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $numberAndProgression = makeNumberAndProgression();
        $censoredNumber = $numberAndProgression[0];
        $modifiedProgression = implode(' ', $numberAndProgression[1]);
        $question = "{$modifiedProgression}";
        $correctAnswer = $censoredNumber;

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }

    runGameEngine($gameRules, $gameData);
}

function makeNumberAndProgression(): array
{
    $stepMin = 1;
    $stepMax = 9;
    $lineLength = 10;
    $lineStart = rand(MIN_NUMBER, MAX_NUMBER);
    $step = rand($stepMin, $stepMax);
    $progression = [];
    $currentNumber = $lineStart;

    for ($i = 0; $i < $lineLength; $i++) {
        $progression[] = $currentNumber;
        $currentNumber += $step;
    }

    $randKey = array_rand($progression, 1);
    $censoredNumber = $progression[$randKey];
    $progression[$randKey] = "..";

    return [$censoredNumber, $progression];
}
