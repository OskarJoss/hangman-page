<?php

declare(strict_types=1);

abstract class Database
{
    protected PDO $pdo;
    protected array $categories;
    protected string $table;
}
