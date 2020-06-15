<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Settings;
use yii\web\NotFoundHttpException;

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
    	$model = $this->findModel(1);

	    if ($model->load(Yii::$app->request->post()) && $model->save()) {
		    \Yii::$app->session->setFlash('success', 'Settings updated successfully');
		    return $this->redirect(['index']);
	    }

	    return $this->render('index', [
		    'model' => $model,
	    ]);
    }

	/**
	 * Finds the Settings model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Settings the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Settings::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}

}
