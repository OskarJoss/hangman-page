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
