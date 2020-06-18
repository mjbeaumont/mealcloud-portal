<?php

/***
 * @var $orders array
 */

?>

<?php if (count($orders)):?>

<div class="list-group">
	<?php foreach ($orders as $order):?>
	<a href="#" class="list-group-item">
        <div class="order-item">
			<div><?php echo $order->TypeDescription?></div>
			<div><?php echo $order->name?><br> <?php echo $order->CountItems?> Items for <?php echo $order->number?></div>
			<div><?php echo \Yii::$app->formatter->asCurrency($order->total)?></div>
			<div><?php echo \Yii::$app->formatter->asDate($order->date, 'short')?></div>
		</div>
    </a>
	<?php endforeach?>
</div>

<?php else: ?>
<div class="panel-body">
	No orders to show.
</div>
<?php endif?>
