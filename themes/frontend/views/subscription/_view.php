<?php
/* @var $this SubscriptionController */
/* @var $data Subscription */
?>
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
    <div class="panel panel-default subscriptionPanel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $data->sub_name ? CHtml::encode($data->sub_name) : "Untitled"; ?></h3>
        </div>
        <div class="panel-body">
            <h4><?php echo $data->hits_allowed ? CHtml::encode($data->hits_allowed) : "0"; ?></h4>
            <h6>Hits</h6>
            <h4>$<?php echo $data->price ? CHtml::encode($data->price) : "0" ; ?></h4>
            <h6>Price/Month</h6>
            <h4 class="total"><?php echo $data->durations_in_days ? CHtml::encode($data->durations_in_days) : "0"; ?> Days</h4>
        </div>
        <div class="panel-footer"><a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/usersDetails/create/plan/<?php echo CHtml::encode($data->id); ?>">Subscribe</a></div>
    </div>
</div>