<?php
namespace App;

class Note
{
    private $id;
    private $content;
    private $createdAt;

    public function __construct(int $id, string $content, \DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}