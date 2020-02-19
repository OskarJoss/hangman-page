<?php

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

if (isset($_SESSION['wordId'])) {
    $word = $wordList->getWord((int) $_SESSION['wordId']);

    $response = [
        'word' => $word
    ];

    session_destroy();

    jsonResponse($response);
}

redirect('/');
