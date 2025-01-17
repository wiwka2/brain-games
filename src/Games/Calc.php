<?php

namespace Php\Project\Games\Calc;

use function Php\Project\GameEngine\runGameEngine;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function runGameCalc(): void
{
    $gameRules = "What is the result of the expression?";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $operators = ['+', '-', '*'];
        $randOperator = $operators[array_rand($operators, 1)];
        $question = "{$firstNumber} {$randOperator} {$secondNumber}";
        $correctAnswer = calculate($firstNumber, $secondNumber, $randOperator);

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    }

    runGameEngine($gameRules, $gameData);
}

function calculate(int $firstNumber, int $secondNumber, string $operator): int
{
    switch ($operator) {
        case '+':
            $answer = $firstNumber + $secondNumber;
            break;
        case '-':
            $answer = $firstNumber - $secondNumber;
            break;
        case '*':
            $answer = $firstNumber * $secondNumber;
            break;
        default:
            return 0;
    }
    return $answer;
}
