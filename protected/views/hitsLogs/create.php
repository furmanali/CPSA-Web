<?php
/* @var $this HitsLogsController */
/* @var $model HitsLogs */

$this->breadcrumbs=array(
	'Hits Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HitsLogs', 'url'=>array('index')),
	array('label'=>'Manage HitsLogs', 'url'=>array('admin')),
);
?>

<h1>Create HitsLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>