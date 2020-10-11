<?php

declare(strict_types=1);

return [

	/*
	|--------------------------------------------------------------------------
	| Love Storage Driver
	|--------------------------------------------------------------------------
	|
	| This configuration options determines the storage driver that will
	| be used to store Love's data. In addition, you may set any
	| custom options as needed by the particular driver you choose.
	|
	*/

	'storage' => [
		'database' => [
			'connection' => env('DB_CONNECTION', 'mysql'),
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Love Database Migrations
	|--------------------------------------------------------------------------
	|
	| Determine if default package migrations should be registered.
	| Set value to `false` when using customized migrations.
	|
	*/

	'load_default_migrations' => false,

];
