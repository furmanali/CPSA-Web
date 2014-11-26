<?php
/* @var $this HitsLogsController */
/* @var $model HitsLogs */

$this->breadcrumbs=array(
	'Hits Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HitsLogs', 'url'=>array('index')),
	array('label'=>'Create HitsLogs', 'url'=>array('create')),
	array('label'=>'View HitsLogs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage HitsLogs', 'url'=>array('admin')),
);
?>

<h1>Update HitsLogs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>