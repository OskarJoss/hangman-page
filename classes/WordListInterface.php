<?php

declare(strict_types=1);

interface WordListInterface
{
    public function getWord(int $id): string;
    public function getRandomRow(): array;
}
