<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

if (isset($_POST['guess'])) {
    $guess = strtolower(trim(filter_var($_POST['guess'], FILTER_SANITIZE_STRING)));
    $word = strtolower($wordList->getWord((int) $_SESSION['wordId']));
    $displayedWord = $_SESSION['displayedWord'];
    $letters = str_split($word);
    $displayedLetters = explode(" ", $displayedWord);
    $isCorrectGuess = false;
    $isOldGuess = false;
    $winGame = false;
    $loseGame = false;

    if (isValidLetter($guess)) {
        foreach ($_SESSION['guessedLetters'] as $guessedLetter) {
            if ($guess === $guessedLetter) {
                $isOldGuess = true;
            }
        }

        if (!$isOldGuess) {
            for ($i = 0; $i < strlen($word); $i++) {
                if ($letters[$i] === $guess) {
                    $displayedLetters[$i] = strtoupper($guess);
                    $isCorrectGuess = true;
                }
            }

            if (!$isCorrectGuess) {
                $_SESSION['wrongLetters'][] = $guess;
            }

            $displayedWord = implode(" ", $displayedLetters);
            $_SESSION['displayedWord'] = $displayedWord;
            $_SESSION['guessedLetters'][] = $guess;

            if (strtolower(implode($displayedLetters)) === $word) {
                $winGame = true;
            }

            if (count($_SESSION['wrongLetters']) === 11) {
                $loseGame = true;
            }

            $response = (object) [
                "isValidResponse" => true,
                "isCorrectGuess" => $isCorrectGuess,
                "displayedWord" => $displayedWord,
                "guess" => strtoupper($guess),
                "winGame" => $winGame,
                "loseGame" => $loseGame
            ];
        } else {
            $response = (object) [
                "isValidResponse" => false,
                "error" => "already guessed that"
            ];
        }
    } else {
        $response = (object) [
            "isValidResponse" => false,
            "error" => "guess must be one letter between a-z"
        ];
    }

    jsonResponse($response);
}

redirect('/');
