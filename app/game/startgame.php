<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

session_destroy();
session_start();

$randomRow = $wordList->getRandomRow();
$id = $randomRow['id'];
$word = $randomRow['word'];
$displayedWord = implode(" ", array_fill(0, strlen($word), "_"));

$_SESSION['wordId'] = $id;
$_SESSION['displayedWord'] = $displayedWord;
$_SESSION['guessedLetters'] = [];
$_SESSION['wrongLetters'] = [];

redirect('/game.php');
