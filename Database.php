# Minor edit
# Minor edit
# Minor edit
<?php
namespace App;

use Doctrine\DBAL\Connection;

class Database
{
    private $connection;

    public function __construct(array $config)
    {
        $this->connection = \Doctrine\DBAL\DriverManager::getConnection($config);
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}