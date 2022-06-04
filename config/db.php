<?php

return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=db;dbname=stavcrm',
//    'username' => 'stavcrm',
//    'password' => '1',
//    'charset' => 'utf8',

    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=postgres;port=5432;dbname=stcrm',
    'username' => 'stavcrm',
    'password' => '1',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
