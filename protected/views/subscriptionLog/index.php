<?php
/* @var $this SubscriptionLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subscription Logs',
);

$this->menu=array(
	array('label'=>'Create SubscriptionLog', 'url'=>array('create')),
	array('label'=>'Manage SubscriptionLog', 'url'=>array('admin')),
);
?>

<h1>Subscription Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
