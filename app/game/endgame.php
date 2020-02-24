<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

if (isset($_SESSION['wordId'])) {
    $wordList = new WordList($pdo, (int) $_SESSION['category']);
    $word = $wordList->getWord((int) $_SESSION['wordId']);

    $response = [
        'word' => $word,
        'category' => $_SESSION['category']
    ];

    session_destroy();

    jsonResponse($response);
}

redirect('/');
