<?php
/* @var $this yii\web\View */
?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    General Settings
                </a>
            </h4>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">

                </div>
                <ul class="list-group">
                    <li class="list-group-item">Auto-send to kitchen<div class="pull-right"><input type="checkbox"></div></li>
                    <li class="list-group-item">Pickup Time</li>
                    <li class="list-group-item">Delivery Time</li>
                    <li class="list-group-item">Default Snooze Minutes</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Printer Settings
                </a>
            </h4>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">

                </div>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Printer Name:</strong> Star Micronics TSP650II Printer</li>
                    <li class="list-group-item"><strong>Printer Status:</strong> <span style="color: green">Connected</span></li>
                    <li class="list-group-item"><strong>Poll Interval</strong>: 5 seconds</li>
                </ul>
            </div>
        </div>
    </div>
</div>

