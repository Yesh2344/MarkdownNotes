# Minor edit
<?php
use App\Note;
use App\NoteRepository;
use Doctrine\DBAL\DriverManager;
use PHPUnit\Framework\TestCase;

class NoteRepositoryTest extends TestCase
{
    private $connection;

    protected function setUp(): void
    {
        $config = [
            'host' => getenv('DB_HOST'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'database' => getenv('DB_NAME')
        ];
        $this->connection = DriverManager::getConnection($config);
        $this->connection->exec('TRUNCATE notes');
    }

    public function testFindAll(): void
    {
        $repository = new NoteRepository($this->connection);
        $this->assertEquals([], $repository->findAll());

        $this->connection->insert('notes', ['content' => 'Test note']);
        $this->assertCount(1, $repository->findAll());
    }

    public function testFindById(): void
    {
        $repository = new NoteRepository($this->connection);
        $this->assertNull($repository->findById(1));

        $this->connection->insert('notes', ['content' => 'Test note']);
        $note = $repository->findById($this->connection->lastInsertId());
        $this->assertInstanceOf(Note::class, $note);
        $this->assertEquals(1, $note->getId());
    }

    public function testCreate(): void
    {
        $repository = new NoteRepository($this->connection);
        $note = $repository->create('Test note');
        $this->assertInstanceOf(Note::class, $note);
        $this->assertEquals(1, $note->getId());
    }

    public function testUpdate(): void
    {
        $repository = new NoteRepository($this->connection);
        $this->connection->insert('notes', ['content' => 'Test note']);
        $note = $repository->findById($this->connection->lastInsertId());
        $repository->update($note->getId(), 'Updated note');
        $updatedNote = $repository->findById($note->getId());
        $this->assertEquals('Updated note', $updatedNote->getContent());
    }

    public function testDelete(): void
    {
        $repository = new NoteRepository($this->connection);
        $this->connection->insert('notes', ['content' => 'Test note']);
        $note = $repository->findById($this->connection->lastInsertId());
        $repository->delete($note->getId());
        $this->assertNull($repository->findById($note->getId()));
    }
}