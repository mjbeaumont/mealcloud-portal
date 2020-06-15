<?php

$user = [
	'identityClass' => 'app\models\User',
	'enableAutoLogin' => true,
	'identityCookie' => [
		'name' => '_identity',
		'path' => '/',
		'domain' => '.mealcloud.beaumontwebdev.com'
	],
	'loginUrl' => ['/account/signin']
];

if (YII_ENV_DEV || YII_ENV_TEST) {
	$user['identityCookie']['domain'] = '.mealcloud.test';
}

return $user;
