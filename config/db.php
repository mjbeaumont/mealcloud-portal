<?php

return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host=' . env('MC_DB_HOST') . ';dbname=' . env('MC_DB_NAME'),
	'username' => env('MC_DB_NAME'),
	'password' => env('MC_DB_PASS'),
	'charset' => 'utf8',

	// Schema cache options (for production environment)
	//'enableSchemaCache' => true,
	//'schemaCacheDuration' => 60,
	//'schemaCache' => 'cache',
];