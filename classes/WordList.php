<?php

declare(strict_types=1);



class WordList extends Database implements WordListInterface
{
    public PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get word from db by id
     *
     * @param integer $id
     * @return string
     */
    public function getWord(int $id): string
    {
        $query = "SELECT * FROM words WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            ':id' => $id
        ]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $row['word'];
    }

    /**
     * Get a random row from the words table as an array with the keys "id" and "word".
     *
     * @return array
     */
    public function getRandomRow(): array
    {
        $query = "SELECT * FROM words ORDER BY RANDOM() LIMIT 1;";
        $statement = $this->pdo->query($query);
        $statement->execute();
        $randomRow = $statement->fetch(PDO::FETCH_ASSOC);

        return $randomRow;
    }
}
