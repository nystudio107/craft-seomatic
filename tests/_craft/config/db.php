<?php

return [
    'dsn' => getenv('DB_DSN'),
    'password' => getenv('DB_PASSWORD'),
    'user' => getenv('DB_USER'),
    'tablePrefix' => getenv('DB_TABLE_PREFIX'),
    'schema' => getenv('DB_SCHEMA'),
];
