<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

session_destroy();
session_start();

$wordList = new WordList($pdo);
$randomRow = $wordList->getRandomRow();
$id = $randomRow['id'];
$word = $randomRow['word'];

//turn word inte displayed word for the front-end.

$_SESSION['wordId'] = $id;
$_SESSION['displayedWord'] = $word;

redirect('/game.php');
