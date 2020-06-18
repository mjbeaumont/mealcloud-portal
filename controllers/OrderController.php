<?php

namespace app\controllers;
use app\models\Order;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\web\Application;

class OrderController extends \yii\web\Controller
{

	public function beforeAction($action)
	{
		if ( $action->id === 'process') {
			$this->enableCsrfValidation = false;
		}

		return parent::beforeAction($action);
	}

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
			],
		];
	}

    public function actionDetail($id)
    {
    	$model = Order::find()->where(["id" => $id])->one();
    	if (!$model) {
    		return $this->redirect("index");
	    }
        return $this->render('detail', [
        	'model' => $model
        ]);
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

	    $json = file_get_contents('php://input');
	    $payload = json_decode($json, true);

	    $items = $payload['items'];
	    unset($payload['items']);

	    $order = new Order();
	    $order->load($payload, '');
	    if ($order->load($payload, '') && $order->save()) {
		    $order->saveItems($items);
	    }
    }

}
