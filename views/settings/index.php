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


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    General Settings
                </a>
            </h4>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">

                </div>
                <ul class="list-group">
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
                    <li class="list-group-item clearfix">
                        <span>Default Snooze Minutes</span>
                        <div class="pull-right">
                            <?php echo $form->field($model, 'snooze')
                               ->dropDownList(\Yii::$app->params['settingsTimeOptions'])?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    Printer Settings
                </a>
            </h4>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">

                </div>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Printer Name:</strong> Star Micronics TSP650II Printer</li>
                    <li class="list-group-item"><strong>Printer Status:</strong> <span
                                style="color: green">Connected</span></li>
                    <li class="list-group-item"><strong>Poll Interval</strong>: 5 seconds</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
	<?= Html::submitButton( 'Save Settings', [ 'class' => 'btn btn-success' ] ) ?>
</div>

<?php ActiveForm::end(); ?>

