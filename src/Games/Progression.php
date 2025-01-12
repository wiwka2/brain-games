<?php

namespace Php\Project\Games\Progression;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function makeProgression()
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

    return $progression;
}

function makeCensoredProgression()
{
    $progression = makeProgression();
    $lineLength = 10;
    $randKey = rand(0, $lineLength - 1);
    $censoredProgression = $progression;
    $censoredNumber = $censoredProgression[$randKey];
    $censoredProgression[$randKey] = "..";

    return [$censoredNumber, $censoredProgression];
}

function gameProgression()
{
    $gameRules = "What number is missing in the progression?\n";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $numberAndProgression = makeCensoredProgression();
        $censoredNumber = $numberAndProgression[0];
        $modifiedProgression = implode(' ', $numberAndProgression[1]);
        $question = "{$modifiedProgression}";
        $correctAnswer = $censoredNumber;

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer];
    }

    return $result = [$gameRules, $gameData];
}
