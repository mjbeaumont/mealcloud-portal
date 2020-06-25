<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$user = require(__DIR__ . '/components/user.php');

$config = [
    'id' => 'basic',
	'name' => 'Mealcloud',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'api'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'defaultRoute' => 'portal/order',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zgdAjnp6TrkRo-WnzaKIaKJYAVC_3i51',
            'parsers' => [
	            'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => $user,
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            	'portal' => 'portal/order',
            	'portal/login' => 'portal/default/login',
            	'portal/<controller:[\w\-]+>/<action:[\w\-]+>' => 'portal/<controller>/<action>',
            	'api/<controller:[\w\-]+>/<action:[\w\-]+>' => 'api/<controller>/<action>'
            ],
        ],
    ],
    'modules' => [
	    'portal' => [
		    'class' => app\modules\portal\Module::class
	    ],
	    'api' => [
	    	'class' => app\modules\api\Module::class
	    ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['192.168.56.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['192.168.56.1', '::1'],
    ];
}

return $config;
