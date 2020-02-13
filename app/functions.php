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
