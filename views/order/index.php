<?php
/***
 * @var $this yii\web\View
 * @var $new array|null
 * @var $inProgress array|null
 * @var $completed array|null
 */

use yii\helpers\Html;
?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                   aria-expanded="false" aria-controls="collapseOne">
                    New Orders (<?php echo count($new)?>)
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <?php echo $this->render("_order-list", [
                   'orders' => $new
            ])?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                   aria-expanded="false" aria-controls="collapseTwo">
                    In Progress (<?php echo count($inProgress)?>)
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
	            <?php echo $this->render("_order-list", [
		            'orders' => $inProgress
	            ])?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                   aria-expanded="false" aria-controls="collapseThree">
                    Completed (<?php echo count($completed)?>)
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
	            <?php echo $this->render("_order-list", [
		            'orders' => $completed
	            ])?>
            </div>
        </div>
    </div>
</div>
