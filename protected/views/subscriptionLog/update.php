<?php
/* @var $this SubscriptionLogController */
/* @var $model SubscriptionLog */

$this->breadcrumbs=array(
	'Subscription Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubscriptionLog', 'url'=>array('index')),
	array('label'=>'Create SubscriptionLog', 'url'=>array('create')),
	array('label'=>'View SubscriptionLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubscriptionLog', 'url'=>array('admin')),
);
?>

<h1>Update SubscriptionLog <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>