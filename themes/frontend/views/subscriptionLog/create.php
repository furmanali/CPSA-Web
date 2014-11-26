<?php
/* @var $this SubscriptionLogController */
/* @var $model SubscriptionLog */

$this->breadcrumbs=array(
	'Subscription Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubscriptionLog', 'url'=>array('index')),
	array('label'=>'Manage SubscriptionLog', 'url'=>array('admin')),
);
?>

<h1>Create SubscriptionLog</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>