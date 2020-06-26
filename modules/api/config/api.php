<?php

$db = require __DIR__ . '/../../../config/db.php';

$config = [
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'zgdAjnp6TrkRo-WnzaKIaKJYAVC_3i51',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
			'class' => yii\web\Request::class
		],
		'response' => [
			'class' => yii\web\Response::class,
			'formatters' => [
				\yii\web\Response::FORMAT_JSON => [
					'class' => 'yii\web\JsonResponseFormatter',
					'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
					'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
				]
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
			'class' => \yii\web\ErrorHandler::class
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log' => [
			'class' => yii\log\Logger::class,
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => $db
	],
	'params' => [
		'cors' => [
			'Origin' => explode(",", env("MC_CORS_ALLOWED_DOMAINS")),
			'Access-Control-Request-Method' => ['POST', 'OPTIONS'],
			'Access-Control-Request-Headers' => ['Content-Type', 'Authorization', 'X-Requested-With'],
			'Access-Control-Max-Age' => 1000,
		]
	]
];

return $config;
