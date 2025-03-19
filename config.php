<?php

return [
    'database' => [
        'username' => 'root',
        'password' => '',
        'host' => 'localhost',
        'dbname' => 'notes',
        'charset' => 'utf8mb4',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ],
    ],
];