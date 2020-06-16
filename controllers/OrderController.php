<?php

namespace app\controllers;

class OrderController extends \yii\web\Controller
{
    public function actionDetail()
    {
        return $this->render('detail');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
