<?php

namespace app\controllers;
use app\models\Order;
use yii\filters\AccessControl;
use yii\web\Application;

class OrderController extends \yii\web\Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'detail'],
				'rules' => [
					[
						'actions' => ['index', 'detail'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			]
		];
	}

    public function actionDetail()
    {
        return $this->render('detail');
    }

    public function actionIndex()
    {

    	$new = Order::find()->new()->all();
    	$inProgress = Order::find()->inProgress()->all();
    	$completed = Order::find()->completed()->all();

        return $this->render('index', [
        	'new' => $new,
	        'inProgress' => $inProgress,
	        'completed' => $completed
        ]);
    }

    public function actionProcess()
    {
	    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$payload = \Yii::$app->request->getBodyParams();
		$order = new Order($payload);
		$response = $order->validate();

	    if ($response) {
		    \Yii::$app->response->setStatusCode(422);
		    return $response;
	    }

	    $order->save();
	    \Yii::$app->response->setStatusCode(201);
	    return ['number' => $order->number];
    }

}
