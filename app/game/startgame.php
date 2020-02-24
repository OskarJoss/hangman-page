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
$id = $randomRow['id'];
$word = $randomRow['word'];
$displayedWord = implode(" ", array_fill(0, strlen($word), "_"));

$_SESSION['wordId'] = $id;
$_SESSION['displayedWord'] = $displayedWord;
$_SESSION['guessedLetters'] = [];
$_SESSION['wrongLetters'] = [];
$_SESSION['category'] = (int) $_GET['category'];

redirect('/game.php');
