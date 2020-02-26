<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

if (!isset($_GET['category'])) {
    redirect('/');
}

session_destroy();
session_start();

$wordList = new WordList($pdo, (int) $_GET['category']);
$randomRow = $wordList->getRandomRow();
$id = (int) $randomRow['id'];
$word = $randomRow['word'];
$displayedLetters = array_fill(0, strlen($word), "_");

for ($i = 0; $i < strlen($word); $i++) {
    if ($word[$i] === " ") {
        $displayedLetters[$i] = "&nbsp;";
    }
}

$displayedWord = implode(" ", $displayedLetters);

$_SESSION['wordId'] = $id;
$_SESSION['displayedWord'] = $displayedWord;
$_SESSION['guessedLetters'] = [];
$_SESSION['wrongLetters'] = [];
$_SESSION['category'] = (int) $_GET['category'];

redirect('/game.php');
