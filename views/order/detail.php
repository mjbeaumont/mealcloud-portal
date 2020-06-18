<?php
/***
 * @var $this yii\web\View
 * @var $model app\models\Order
 */
use yii\helpers\Html;
?>
<div class="panel panel-default">
    <div class="panel-heading clearfix order-heading">
        <h3>Order details for #<?php echo $model->number?></h3>
        <div class="button-container">
		    <?php if ($model->status === $model::STATUS_NEW):?>
			    <?= Html::a('Accept', ['#'], ['class'=>'btn btn-success']) ?>
			    <?= Html::a('Cancel', ['/controller/action'], ['class'=>'btn btn-danger', 'confirm' => 'Are you sure you want to cancel this order?']) ?>
		    <?php endif?>
		    <?= Html::submitButton( 'Reprint', [ 'class' => 'btn btn-info' ] ) ?>
        </div>
    </div>
    <div class="panel-body">
        <div>Pickup Order @ <?php echo \Yii::$app->formatter->asDateTime($model->date, 'short')?></div>
            <div><?php echo $model->CountItems?> item(s)</div>
		    <?php if ($model->instructions):?>
                <div class="text-danger"> <?php echo $model->instructions?></div>
		    <?php endif?>
	        <?php if ($model->utensils):?>
                <div class="text-danger">No utensils please!</div>
	        <?php endif?>
            <?php if ($model->curbside):?>
                <div class="text-danger">Curbside pickup requested.</div>
            <?php endif?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Items Ordered</h4>
    </div>
    <ul class="list-group">
        <?php foreach ($model->orderItems as $item):?>
        <li class="list-group-item">
            <div class="order-item">
                <div><?php echo $item->qty?> <?php echo $item->description?></div>
                <div><?php echo \Yii::$app->formatter->asCurrency($item->Subtotal)?></div>
            </div>
            <?php if ($item->requests):?>
            <div class="text-danger"><?php echo $item->requests?></div>
            <?php endif?>
        </li>
        <?php endforeach?>
    </ul>
</div>

<div class="totals">
    <div class="total-line">
        <div class="total-description">Subtotal:</div>
        <div class="total-amount"><?php echo \Yii::$app->formatter->asCurrency($model->subtotal)?></div>
    </div>
    <?php if ($model->gratuity):?>
    <div class="total-line">
        <div class="total-description">Gratuity:</div>
        <div class="total-amount"><?php echo \Yii::$app->formatter->asCurrency($model->gratuity)?></div>
    </div>
    <?php endif?>
	<?php if ($model->tax):?>
        <div class="total-line">
            <div class="total-description">Sales Tax:</div>
            <div class="total-amount"><?php echo \Yii::$app->formatter->asCurrency($model->tax)?></div>
        </div>
	<?php endif?>
    <div class="total-line">
        <div class="total-description">Total</div>
        <div class="total-amount"><?php echo \Yii::$app->formatter->asCurrency($model->total)?></div>
    </div>
</div>



