<?php
/* @var $this SubscriptionController */
/* @var $data Subscription */
?>
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
    <div class="panel panel-default subscriptionPanel">
        <div class="panel-heading">
            <h3 class="panel-title">Subscription Name</h3>
        </div>
        <div class="panel-body">
            <h4><?php echo CHtml::encode($data->hits_allowed); ?></h4>
            <h6>Hits</h6>
            <h4>$<?php echo CHtml::encode($data->price); ?></h4>
            <h6>Price/Month</h6>
            <h4 class="total"><?php echo CHtml::encode($data->durations_in_days); ?> Days</h4>
        </div>
        <div class="panel-footer"><a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/usersDetails/create/plan/<?php echo CHtml::encode($data->id); ?>">Subscribe</a></div>
    </div>
</div>