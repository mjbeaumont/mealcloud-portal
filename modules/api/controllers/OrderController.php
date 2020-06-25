<?php

namespace app\modules\api\controllers;

use app\modules\api\components\Controller;
use app\models\Order;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class OrderController extends Controller
{
	public function actionIndex()
	{

	}

	public function actionProcess()
	{
		$model = new Order();

		if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
			$response = \Yii::$app->getResponse();
			$response->setStatusCode(201);
		} elseif (!$model->hasErrors()) {
			throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
		}

		return $model;
	}

	public function verbs() {
		return ['OPTIONS', 'POST'];
	}
}