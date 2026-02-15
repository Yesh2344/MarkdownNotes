<?php
namespace App;

use Doctrine\DBAL\Connection;

class NoteRepository
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(): array
    {
        $notes = $this->connection->fetchAll('SELECT * FROM notes');
        $result = [];
        foreach ($notes as $note) {
            $result[] = new Note($note['id'], $note['content'], new \DateTimeImmutable($note['created_at']));
        }
        return $result;
    }

    public function findById(int $id): ?Note
    {
        $note = $this->connection->fetchAssoc('SELECT * FROM notes WHERE id = ?', [$id]);
        if ($note) {
            return new Note($note['id'], $note['content'], new \DateTimeImmutable($note['created_at']));
        }
        return null;
    }

    public function create(string $content): Note
    {
        $this->connection->insert('notes', ['content' => $content]);
        $id = $this->connection->lastInsertId();
        return new Note($id, $content, new \DateTimeImmutable());
    }

    public function update(int $id, string $content): void
    {
        $this->connection->update('notes', ['content' => $content], ['id' => $id]);
    }

    public function delete(int $id): void
    {
        $this->connection->delete('notes', ['id' => $id]);
    }
}