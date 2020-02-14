<?php

declare(strict_types=1);

/**
 * Redirect the user to given path.
 *
 * @param string $path
 *
 * @return void
 */
function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

/**
 * set headers, echo json encode and exit().
 *
 * @param mixed $response
 * @return void
 */
function jsonResponse($response): void
{
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}

/**
 * Check if a string is a single letter between a-z.
 *
 * @param string $letter
 * @return boolean
 */
function isValidLetter(string $letter): bool
{
    if (strlen($letter) !== 1) {
        return false;
    }

    if (!ctype_alpha($letter)) {
        return false;
    }

    return true;
}

/**
 * Get src for the hangman-img by counting items in wrongLetters array
 *
 * @param array $wrongLetters
 * @return string
 */
function getImgSrc(array $wrongLetters): string
{
    $numberOfWrongGuesses = count($wrongLetters);
    $imgArray = [
        "/images/01.png",
        "/images/02.png",
        "/images/03.png",
        "/images/04.png",
        "/images/05.png",
        "/images/06.png",
        "/images/07.png",
        "/images/08.png",
        "/images/09.png",
        "/images/10.png",
        "/images/11.png",
        "/images/12.png"
    ];

    return $imgArray[$numberOfWrongGuesses];
}
