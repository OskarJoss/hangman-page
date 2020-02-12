<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

session_destroy();
session_start();

$wordList = new WordList($pdo);
$randomRow = $wordList->getRandomRow();
$id = $randomRow['id'];
$word = $randomRow['word'];
$displayedWord = implode(" ", array_fill(0, strlen($word), "_"));

$_SESSION['wordId'] = $id;
$_SESSION['displayedWord'] = $displayedWord;

redirect('/game.php');
