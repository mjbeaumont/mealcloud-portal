<?php
/***
 * @var $this yii\web\View
 * @var $model app\models\Settings
 */


use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\helpers\Html;


$form = kartik\form\ActiveForm::begin(
	[
		'id'          => 'settings-form',
		'fieldConfig' => [
			'autoPlaceholder' => true
		]
	] );
?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    General Settings
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <ul class="list-group">
                <li class="list-group-item clearfix">
                    <span>Auto-accept orders</span>
                    <div class="pull-right">
			            <?php echo $form->field( $model, 'auto_accept' )
			                            ->widget( SwitchInput::class);
			            ?>
                    </div>

                </li>
                <li class="list-group-item clearfix">
                    <span>Auto-send to kitchen</span>
                    <div class="pull-right">
					    <?php echo $form->field( $model, 'auto_send' )
					                    ->widget( SwitchInput::class);
					    ?>
                    </div>

                </li>
                <li class="list-group-item clearfix">
                    <span>Pickup Time</span>
                    <div class="pull-right">
					    <?php echo $form->field($model, 'pickup_time')
					                    ->dropDownList(\Yii::$app->params['settingsTimeOptions'])?>
                    </div>
                </li>
                <li class="list-group-item clearfix">
                    <span>Delivery Time</span>
                    <div class="pull-right">
					    <?php echo $form->field($model, 'delivery_time')
					                    ->dropDownList(\Yii::$app->params['settingsTimeOptions'])?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    Printer Settings
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <ul class="list-group">
                <li class="list-group-item"><strong>Printer Name:</strong> Star Micronics TSP650II Printer</li>
                <li class="list-group-item"><strong>Printer Status:</strong> <span
                            class="text-success">Connected</span></li>
                <li class="list-group-item"><strong>Poll Interval</strong>: 5 seconds</li>
            </ul>
        </div>
    </div>
</div>

<div class="form-group">
	<?= Html::submitButton( 'Save Settings', [ 'class' => 'btn btn-success' ] ) ?>
</div>

<?php ActiveForm::end(); ?>

