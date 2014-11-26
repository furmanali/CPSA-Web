<?php
/* @var $this HitsLogsController */
/* @var $model HitsLogs */

$this->breadcrumbs=array(
	'Hits Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HitsLogs', 'url'=>array('index')),
	array('label'=>'Create HitsLogs', 'url'=>array('create')),
	array('label'=>'Update HitsLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HitsLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HitsLogs', 'url'=>array('admin')),
);
?>

<h1>View HitsLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_credentials_id',
		'authkey',
		'x2license',
		'google_drive_template_id',
		'google_printer_id',
		'ip',
		'email',
		'status',
		'date_created',
	),
)); ?>
