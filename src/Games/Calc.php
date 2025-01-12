<?php

namespace Php\Project\Games\Calc;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function gameCalc()
{
    $gameRules = "What is the result of the expression?\n";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $operators = ['+', '-', '*'];
        $randOperator = $operators[rand(0, 2)];
        $question = "{$firstNumber} {$randOperator} {$secondNumber}";

        switch ($randOperator) {
            case '+':
                (string)$correctAnswer = $firstNumber + $secondNumber;
                break;
            case '-':
                (string)$correctAnswer = $firstNumber - $secondNumber;
                break;
            case '*':
                (string)$correctAnswer = $firstNumber * $secondNumber;
                break;
        }

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer];
    }

    return [$gameRules, $gameData];
}
