<?php

/***
 * @var $orders array
 * @var $text_color string
 */

use yii\helpers\Url;

$item_class = isset($text_color) ? 'text-' . $text_color : '';
?>

<?php if (count($orders)):?>

<div class="list-group">
	<?php foreach ($orders as $order):?>
	<a href="<?php echo Url::to(['order/detail', 'id' => $order->id])?>" class="list-group-item">
        <div class="order-item <?php echo $item_class?>">
			<div><?php echo $order->TypeDescription?></div>
			<div><?php echo $order->name?><br> <?php echo $order->CountItems?> Items for <?php echo $order->number?></div>
			<div><?php echo \Yii::$app->formatter->asCurrency($order->total)?></div>
			<div><?php echo \Yii::$app->formatter->asDate($order->date, 'MMMM d')?></div>
		</div>
    </a>
	<?php endforeach?>
</div>

<?php else: ?>
<div class="panel-body">
	No orders to show.
</div>
<?php endif?>
