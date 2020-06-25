<?php

namespace app\modules\portal;

/**
 * portal module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\portal\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

	    \Yii::$app->user->loginUrl = ['/portal/login'];

        // custom initialization code goes here
    }

	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			$publicRoutes = ['login','logout'];
			if (!in_array($action->id, $publicRoutes)) {
				if (\Yii::$app->user->isGuest) {
					\Yii::$app->user->loginRequired();
				}
			}
			return true;
		} else {
			return false;
		}
	}
}
