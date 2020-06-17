<?php

namespace app\controllers;
use app\models\Order;
use yii\filters\AccessControl;

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

}
