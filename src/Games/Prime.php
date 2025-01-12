<?php

namespace Php\Project\Games\Prime;

use const Php\Project\GameEngine\ROUNDS_COUNT;
use const Php\Project\GameEngine\MIN_NUMBER;
use const Php\Project\GameEngine\MAX_NUMBER;

function isPrime($number)
{
        if ($number==2)
                return true;
	if ($number%2==0)
		return false;
	$i=3;
	$max_factor = (int)sqrt($number);
	while ($i<=$max_factor){
		if ($number%$i == 0)
			return false;
		$i+=2;
	}
	return true;
}

function gamePrime()
{
    $gameRules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "{$number}";
        $correctAnswer = isPrime($number) ? "yes" : "no";

        $gameData [] = [
            'question' => $question,
            'correctAnswer' => $correctAnswer];
    }

    return $result = [$gameRules, $gameData];
}
