<?php
/***
 * @var $this yii\web\View
 * @var $new array|null
 * @var $inProgress array|null
 * @var $completed array|null
 */

use yii\helpers\Html;
?>

<h4>Status: <span class="text-success">Online and accepting orders</span></h4>
<div class="panel-group" role="tablist" aria-multiselectable="false">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    New Orders (<?php echo count($new)?>)
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <?php echo $this->render("_order-list", [
                   'orders' => $new,
                   'text_color' => 'danger'
            ])?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    In Progress (<?php echo count($inProgress)?>)
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
            <?php echo $this->render("_order-list", [
		        'orders' => $inProgress
	        ])?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" href="#collapseThree"
                   aria-expanded="false" aria-controls="collapseThree">
                    Completed (<?php echo count($completed)?>)
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	        <?php echo $this->render("_order-list", [
		        'orders' => $completed
	        ])?>
        </div>
    </div>
</div>
