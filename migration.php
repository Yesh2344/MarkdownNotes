<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\SchemaException;

require __DIR__ . '/vendor/autoload.php';

$config = [
    'host' => getenv('DB_HOST'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'database' => getenv('DB_NAME')
];

try {
    $connection = DriverManager::getConnection($config);
    $schemaManager = $connection->getSchemaManager();

    if (!$schemaManager->tablesExist('notes')) {
        $schema = new \Doctrine\DBAL\Schema\Schema();
        $table = $schema->createTable('notes');
        $table->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $table->addColumn('content', 'text');
        $table->addColumn('created_at', 'datetime');
        $table->setPrimaryKey(['id']);
        $schemaManager->createTable($table);
    }
} catch (SchemaException $e) {
    echo $e->getMessage();
}