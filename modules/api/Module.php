<?php

namespace app\modules\api;
use yii\base\BootstrapInterface;
use yii\rest\UrlRule;

/**
 * api module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
	    \Yii::configure($this, require __DIR__ . '/config/api.php');
    }

    public function bootstrap($app) {
	    $app->getUrlManager()->addRules([
		    'POST api/order/process' => 'api/order/process',
		    'api/order' => 'api/order/options'
	    ], false);
    }
}
