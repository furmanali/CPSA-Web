<?php
/* @var $this HitsCounterController */
/* @var $model HitsCounter */

$this->breadcrumbs=array(
	'Hits Counters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HitsCounter', 'url'=>array('index')),
	array('label'=>'Create HitsCounter', 'url'=>array('create')),
	array('label'=>'Update HitsCounter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HitsCounter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HitsCounter', 'url'=>array('admin')),
);
?>

<h1>View HitsCounter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_credentials_id',
		'hits_available',
		'hits_success',
		'hits_failure',
		'counter_total',
		'counter_consecutive_failed',
		'date_of_expiry',
	),
)); ?>
