<?php

declare(strict_types=1);

class WordList extends Database implements WordListInterface
{
    protected PDO $pdo;
    protected array $categories = ['star_wars', 'bands', 'words'];
    protected string $table;

    public function __construct(PDO $pdo, int $category)
    {
        $this->pdo = $pdo;
        $this->table = $this->categories[$category];
    }

    /**
     * Get word from db by id
     *
     * @param integer $id
     * @return string
     */
    public function getWord(int $id): string
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        if (!$statement) {
            die(var_dump($this->pdo->errorInfo()));
        }

        $statement->execute([
            ':id' => $id,
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
        $query = "SELECT * FROM $this->table ORDER BY RANDOM() LIMIT 1;";
        $statement = $this->pdo->prepare($query);
        if (!$statement) {
            die(var_dump($this->pdo->errorInfo()));
        }
        $statement->execute();
        $randomRow = $statement->fetch(PDO::FETCH_ASSOC);

        return $randomRow;
    }
}
