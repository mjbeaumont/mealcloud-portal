<?php

namespace app\controllers;

use yii\filters\AccessControl;

class SettingsController extends \yii\web\Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			]
		];
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }

}
