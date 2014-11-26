<?php
/* @var $this SubscriptionLogController */
/* @var $model SubscriptionLog */

$this->breadcrumbs=array(
	'Subscription Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SubscriptionLog', 'url'=>array('index')),
	array('label'=>'Create SubscriptionLog', 'url'=>array('create')),
	array('label'=>'Update SubscriptionLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubscriptionLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubscriptionLog', 'url'=>array('admin')),
);
?>

<h1>View SubscriptionLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_credentials_id',
		'subscription_id',
		'sub_name',
		'hits_allowed',
		'durations_in_days',
		'price',
		'purchase_date',
	),
)); ?>
