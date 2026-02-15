# Minor edit
<?php
return [
    'db' => [
        'host' => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'database' => getenv('DB_NAME')
    ],
    'logging' => [
        'level' => 'DEBUG',
        'filename' => 'logs/app.log'
    ]
];