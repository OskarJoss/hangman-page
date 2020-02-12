<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header("Content-Type: application/json");

if (isset($_POST['guess'])) {
    $wordList = new WordList($pdo);
    $guess = strtolower($_POST['guess']);

    $word = $wordList->getWord((int) $_SESSION['wordId']);
    $displayedWord = $_SESSION['displayedWord'];

    $letters = str_split($word);
    $displayedLetters = explode(" ", $displayedWord);

    for ($i = 0; $i < strlen($word); $i++) {
        if ($letters[$i] === $guess) {
            $displayedLetters[$i] = strtoupper($guess);
        }
    }

    $displayedWord = implode(" ", $displayedLetters);

    $_SESSION['displayedWord'] = $displayedWord;

    echo json_encode($displayedWord);
    exit;
}
